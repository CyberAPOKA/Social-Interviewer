<?php

use App\Models\Painel\Form;
namespace App\Http\Controllers;
use App\Candidato;
use Illuminate\Http\Request;
use App\Arquivo;
use App\Http\Requests\CandidatoUpdateRequest;
use App\Http\Requests\ConsultaCandidatoRequest;
use App\Http\Requests\CandidatoRequest;
use App\Rules;
use Response;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovoContato;
use DateTime;
use Validator;
use App\Rules\FullName;
use App\Rules\FullNameMae;
use JsValidator;
use App\Configuracoes;
use PDF;





class CandidatoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private $form;


    public function index()
    {
        $candidato = Candidato::all();

        return view('candidatos.tabela', compact('candidato'));
    }

    public function visualizar($id)
    {
        $candidato = Candidato::find($id);

        $documentos = Arquivo::where('candidato_id','=',$id)->orderBy('tipo')->get();

        return view('candidatos.visualizaCandidato', compact('candidato','documentos'));
    }



    public function menu()
    {
        //dd($lastRecord);
        return view('main');
    }



    public function baixarDocumento($id){
        $arquivo = Arquivo::where('id','=',$id)->get()->first();
        $candidato = Candidato::find($arquivo->candidato_id);
        return Response::download(storage_path('app/public/'.$arquivo->arquivo),str_replace(' ','_',$candidato->nome).'_'.$arquivo->tipo.'.pdf');
    }


    public function baixarTodosDocumentos($id){
        $candidato = Candidato::find($id);
        $zip_file = str_replace(' ','_',$candidato->nome) . '_documentos.zip';
        $zip = new \ZipArchive();

        error_log("caminho:" . storage_path('app/public') . '/' . $zip_file);
        $zip->open(storage_path('app/public') . '/' . $zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = storage_path('app/public/inscricoes/'.$id);
        $candidatos = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($candidatos as $name => $candidato)
        {
            // We're skipping all subfolders
            if (!$candidato->isDir()) {
                $candidatoPath     = $candidato->getRealPath();

                // extracting filename with substr/strlen
                $relativePath = 'inscricoes/' . substr($candidatoPath, strlen($path) + 1);

                $zip->addFile($candidatoPath,  $relativePath);
            }
        }
        $zip->close();
        return response()->download(storage_path('/app/public') . '/' . $zip_file)->deleteFileAfterSend(true);

    }



    public function realizarInscricao(Request $request)
    {

                $configuracoes = Configuracoes::first();


             if($configuracoes->fimInscricao<NOW())
             return view('fim')->with('message', 'O período de inscrições encerrou em ' . $configuracoes->fimInscricao->format('d/m/Y').  ' às ' .$configuracoes->fimInscricao->format('H:i') . '.');





        $cpfSanitizado  = str_replace( array( '.', '-' ), '', $request->input('cpf'));

        $request->merge(array('cpf' => $cpfSanitizado));




        $validator = Validator::make($request->all(),
            ['nome' => ['required', new FullName],
            'datadenascimento' => 'required|date_format:d/m/Y',
            'nomemae' => ['required', new FullNameMae],
            'cpf' => 'cpf|unique:candidatos|required',
            'identidade' => 'required',
            'endereco' => 'required',

            'escolaridade' =>  'mimes:pdf|file|max:10240',
            'curriculo' => 'mimes:pdf|file|max:10240',
            'cursos.*' => 'mimes:pdf|file|max:10240',
            'experiencia.*' => 'mimes:pdf|file|max:10240',
            'atestado' => 'mimes:pdf|file|max:10240',
            'alvara' => 'mimes:pdf|file|max:10240',

            'email' => 'required|email'],

        [ 'cpf.cpf' => 'O CPF informado é inválido.',
        'datadenascimento.date_format' => 'A data de nascimento informada é inválida.',
        'cpf.unique' => 'O CPF já está cadastrado no sistema.',

        'escolaridade.max' => 'O arquivo de escolaridade deve possuir no máximo 10 Megabytes.',
        'escolaridade.mimes' => 'O arquivo de escolaridade deve ser no formato PDF.',

        'curriculo.max' => 'O arquivo de currículo deve possuir no máximo 10 Megabytes.',
        'curriculo.mimes' => 'O arquivo de currículo deve ser no formato PDF.',

        'cursos.*.max' => 'O arquivo de cursos deve possuir no máximo 10 Megabytes.',
        'cursos.*.mimes' => 'O arquivo de cursos deve ser no formato PDF.',

        'experiencia.*.max' => 'O arquivo de experiências deve possuir no máximo 10 Megabytes.',
        'experiencia.*.mimes' => 'O arquivo de experiências deve ser no formato PDF.',


        'atestado.max' => 'O arquivo de atestado deve ser no máximo 10 Megabytes.',
        'atestado.mimes' => 'O arquivo de atestado deve ser no formato PDF.',

        'alvara.max' => 'O arquivo de alvará deve ser no máximo 10 Megabytes.',
        'alvara.mimes' => 'O arquivo de alvará deve ser no formato PDF.',




        ]);



        if ($validator->fails()) {
           /* Log::info('Tentativa de acesso porém dados inválidos. CPF informado: ' . $request->input('cpf'));*/
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $candidato = new Candidato();
        $candidato->nome = $request->input('nome');
        $candidato->email = $request->input('email');
        $candidato->nomeMae = $request->input('nomemae');
        $candidato->identidade = $request->input('identidade');
        $candidato->endereco = $request->input('endereco');
        $candidato->numero = $request->input('numero');
        $candidato->cidade = $request->input('cidade');
        $candidato->estado = $request->input('estado');
        $candidato->cidade = $request->input('cidade');
        $candidato->cep = $request->input('cep');
        $candidato->opcao = $request->input('opcao');
        $candidato->cpf = $cpfSanitizado;

        $candidato->datadenascimento =  DateTime::createFromFormat('d/m/Y', $request->input('datadenascimento'));
        $candidato->save();



        $escolaridade = new Arquivo();

        if(!is_null($request->file('escolaridade'))) {
            $escolaridade->arquivo = $request->file('escolaridade')->store('inscricoes/'.$candidato->id);
            $escolaridade->tipo = 'escolaridade';
            $escolaridade->candidato_id = $candidato->id;
            $escolaridade->save();
          }

        $curriculo = new Arquivo();

        if(!is_null($request->file('curriculo'))) {
            $curriculo->arquivo = $request->file('curriculo')->store('inscricoes/'.$candidato->id);
            $curriculo->tipo = 'curriculo';
            $curriculo->candidato_id = $candidato->id;
            $curriculo->save();
             }

             $atestado = new Arquivo();

             if(!is_null($request->file('atestado'))) {
                 $atestado->arquivo = $request->file('atestado')->store('inscricoes/'.$candidato->id);
                 $atestado->tipo = 'atestado';
                 $atestado->candidato_id = $candidato->id;
                 $atestado->save();
                  }

                  $alvara = new Arquivo();

                  if(!is_null($request->file('alvara'))) {
                    $alvara->arquivo = $request->file('alvara')->store('inscricoes/'.$candidato->id);
                    $alvara->tipo = 'alvara';
                    $alvara->candidato_id = $candidato->id;
                    $alvara->save();
                     }

             // Multiplos arquivos >>>

             //$cursos = new Arquivo();
             //$cursos = [];
             if(!empty($request->allFiles()['cursos'])){
             for($i = 0; $i <count($request->allFiles()['cursos']); $i++){
                $arquivo = $request->allFiles()['cursos'][$i];

                $curso = new Arquivo();
                $curso->tipo = 'curso';
                $curso->candidato_id = $candidato->id;
                $curso->arquivo = $arquivo->store('inscricoes/'.$candidato->id);

                $curso->save();
               // array_push($cursos, $curso);
               // unset($cursos);
             }
            }

            if(!empty($request->allFiles()['experiencia'])){
             for($i = 0; $i <count($request->allFiles()['experiencia']); $i++){
                $arquivo = $request->allFiles()['experiencia'][$i];

                $experiencia = new Arquivo();
                $experiencia->tipo = 'experiencia';
                $experiencia->candidato_id = $candidato->id;
                $experiencia->arquivo = $arquivo->store('inscricoes/'.$candidato->id);
                $experiencia->save();

             }
            }


                Mail::send('email', ['inscricao' => $candidato->id, 'nome' => $candidato->nome], function ($message) use ($candidato){

                $message->from('sistemas.saoleo@saoleopoldo.rs.gov.br','Secretaria de desenvolvimento social');
                $message->to($candidato->email);
                $message->subject('Confirmação de inscrição para entrevistador social');


                });

             return view('fim')
            ->with('message', 'A sua inscrição foi realizada com sucesso! Um e-mail de confirmação foi enviado para ' . $candidato->email . '.');



    }

            public function verificarPeriodoInscricoes(){
                $configuracoes = Configuracoes::first();
             if($configuracoes->inicioInscricao>NOW())
             return view('fim')->with('message', 'O período de inscrições começa a partir de ' . $configuracoes->inicioInscricao->format('d/m/Y').  ' às ' .$configuracoes->inicioInscricao->format('H:i') . '.');
             elseif($configuracoes->fimInscricao<NOW())
             return view('fim')->with('message', 'O período de inscrições encerrou em ' . $configuracoes->fimInscricao->format('d/m/Y').  ' às ' .$configuracoes->fimInscricao->format('H:i') . '.');
             else return view('index');
            }
}



