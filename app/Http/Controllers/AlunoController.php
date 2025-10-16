<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aluno;
use App\Models\Turma;

class alunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $alunos = Aluno::all();
        $alunos_niver_2005 = Aluno::where('data_nascimento', '2005-05-10')->get();
        $alunos = Aluno::where('data_nascimento', '<', '2006-01-01')->get();
        $alunos_silva = Aluno::where('nome', 'like', '%Silva%')->get();
        $alunos = Aluno::whereBetween('data_nascimento', ['2004-01-01', '2006-12-31'])->get();
        $alunos = Aluno::where('data_nascimento', '>', '2005-01-01')
               ->where('email', 'like', '%@gmail.com')
               ->get();
        return view('aluno.index', compact('alunos', 'alunos_niver_2005', 'alunos_silva'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $turmas = Turma::all();
       return view('aluno.create',compact('turmas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nome_arquivo = PATHINFO($request->foto->getClientOriginalName(),PATHINFO_FILENAME);
        $extensao_arquivo = $request->foto->getClientOriginalExtension();
        $foto = $nome_arquivo.'-'.time().'.'.$extensao_arquivo;
        $aluno = Aluno:: create([
            'matricula' => $request->matricula,
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'foto' => 'imagens/'. $foto
        ]);

        $request->foto->move(public_path('imagens'),$foto);

        $aluno->turmas()->attach($request->turma_id);
        $aluno->contatoAluno()->create([
            'telefone'=> $request->telefone
        ]);
        return redirect()->route('aluno.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     $aluno = Aluno::find($id);
     $alunos_niver_1005 = Aluno::where('data_nascimento', '2025-05-10')->get();
     return view('aluno.show', compact('aluno', 'alunos_niver_1510'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aluno = aluno::find($id);
        $turmas = Turma::all();
       return view('aluno.create',compact('turmas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $foto= null;
        if($request->hasFile('foto')) {
          
        $nome_arquivo = pathinfo($request->foto->getClientOriginalName(),PATHINFO_FILENAME);
        $extensao_arquivo = $request->foto->getClientOriginalExtension();
        $foto = $nome_arquivo.'-'.time().'.'.$extensao_arquivo;
        $request->foto->move(public_path('imagens'),$foto);
     }

        $aluno = aluno::find($id);
        $aluno->update([
            'matricula' => $request->matricula,
            'nome' => $request->nome,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'foto' => 'imagens/'. isset($foto) ? $foto : $aluno->foto
        ]);
        $aluno->turmas()->syncWithoutDetaching($request->turma_id);
        
        $aluno->contatoAluno()->uptade([
            'telefone' => $request->telefone
        ]);

        return redirect()->route('aluno.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aluno = Aluno::find($id);
        $id_contato_aluno= $aluno->contatoAluno->id;
        $contato_aluno= ContatoAluno::find($id_contato_aluno);
        $contato_aluno->delete();
        $aluno->delete();
        return redirect()->route('aluno.index');
    }
}
