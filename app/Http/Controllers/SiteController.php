<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Usuarios;
class SiteController extends Controller
{

    public function index(Usuarios $usuarios)
    {
        /*
            $lista_usuarios = Ordena a lista de usuários pela ultima modificação
            $paginate_links = Mostra somente 5 usuários por página
        */

        $lista_usuarios = $usuarios->orderBy('updated_at', 'DESC')->paginate(5);

        $paginate_links = $usuarios->paginate(5);

        return view('index', compact('lista_usuarios', 'paginate_links'));
    }

    public function cadastro(){
        return view('cadastro');
    }

    public function criar(Request $request, Usuarios $usuarios)
    {
        /* 
            $dados  = guarda a validaçao de todos dados recebidos pelo $request
            $insere = vai inserir os dados pelo create.
         */
        $dados = $request->validate(['nome'         => 'required|min:5|max:32',
                                     'cpf'          => 'required|min:11|max:11|unique:usuarios',
                                     'telefone'     => 'required|min:8|max:15',
                                     'uf'           => 'required|min:2|max:2',
                                     'cidade'       => 'required',
                                     'bairro'       => 'required',
                                     'cep'          => 'required',
                                     'nascimento'   => 'required']);

        $insere = $usuarios->create($dados);
        if ($insere) {
            return redirect()->back()->with(['msg_sucesso' => 'Cadastro realizado com sucesso.']);
        }else{
            return redirect()->back();
        }
    }

    public function editar($id, Usuarios $usuarios)
    {
        /*
            Verifica se o $id não é nulo.
            Se não for, ele busca o ID e retorna o resultado pra view.
        */
        if($id != NULL){
            $retorna_user = $usuarios->find($id);
            return view('cadastro', compact('retorna_user'));

        }else{
            return redirect()->back();
        }
    }


    public function update(Request $request, Usuarios $usuarios)
    {
        /*
            $dados    = guarda os dados vindo do $request e faz a validaçao
            $usuarios = faz o update por meio do 'cpf' que é uma chave unica 
        */
        $dados = $request->validate(['nome'         => 'required|min:5|max:32',
                                     'cpf'          => 'required|min:11|max:11',
                                     'telefone'     => 'required|min:8|max:15',
                                     'uf'           => 'required|min:2|max:2',
                                     'cidade'       => 'required',
                                     'bairro'       => 'required',
                                     'cep'          => 'required',
                                     'nascimento'   => 'required']);

        $request = $request->all();
        $cpf = $request['cpf'];

        $usuarios = $usuarios->where('cpf', $cpf)->update($request);


        if($usuarios){
            return redirect('index')->with('msg_update', 'Usuário alterado.');
        }else{
            return redirect()->back();
        }
    }


    public function destroy($id, Usuarios $usuarios)
    {
        /*
            Se o $id não for nulo, ele deleta.
            Caso contrário, ele volta para página anterior.
        */
        if($id != NULL){
            $deleta = $usuarios->destroy($id);

            if($deleta){
                return redirect()->back()->with(['msg_delete' => 'Usuário deletado com sucesso.']);
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

}
