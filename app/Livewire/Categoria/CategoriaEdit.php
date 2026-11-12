<?php

namespace App\Livewire\Categoria;

use App\Models\Categoria;
use Livewire\Component;

class CategoriaEdit extends Component
{
    // funcao mount {
    // receber id de referencia do que sera editado
    // buscar por id
    // validar se a pesquisa retornou resultado
    // capturar os dados dos campos
    // preencher os campos
    // }

    //funcao update
    // receber id de referencia do que sera editado
    // buscar por id
    // validar se a pesquisa retornou resultado
    // capturar os dados dos campos
    // atualizar
    // retornar e redirecionar

    public $nome;
    public $categoria_id;

    public function mount($id){
        $categoria = Categoria::find($id);

        if($categoria == null){
            session()->flash('error', 'categoria nao encontrada');
            return redirect()->route('categoria.index');
        }

        $this->categoria_id = $categoria->id;
        $this->nome = $categoria->nome;
    }

    public function update(){
        $categoria = Categoria::find($this->categoria_id);

        if($categoria == null){
            session()->flash('error', 'categoria nao encontrada');
            return redirect()->route('categoria.index');
        }

        $categoria->nome = $this->nome;
        $categoria->save();
         session()->flash('success', 'atualizado');
            return redirect()->route('categoria.index');

    }

    public function render()
    {
        return view('livewire.categoria.categoria-edit');
    }
}
