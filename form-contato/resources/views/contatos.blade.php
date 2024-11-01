<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-header">
                                    <h4 class="card-title"> Lista de Contatos</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table tablesorter mx-auto" id="" style="width: -webkit-fill-available;">
                                            <thead class=" text-primary">
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Nome</th>
                                                <th class="text-center">E-mail</th>
                                                <th class="text-center">Titulo</th>
                                                <th class="text-center">Mensagem</th>
                                                <th class="text-center">Data Inclusão</th>
                                                <th class="text-center">Ação</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if (isset($contatos) && empty($contatos))
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-center"></td>
                                                </tr>
                                            @else
                                                @foreach ($contatos as $k => $contato)
                                                    <tr class="text-center">
                                                        <td class="text-center">{{ $k+1 }}</td>
                                                        <td class="text-center">{{ $contato->name }}</td>
                                                        <td class="text-center">{{ $contato->email }}</td>
                                                        <td class="text-center">{{ $contato->title }}</td>
                                                        <td class="text-center">{{ $contato->description }}</td>
                                                        <td class="text-center">{{ (isset($contato->created_at)) ? date('d/m/Y H:i:s', strtotime($contato->created_at)) : '__/__/____' }}</td>
                                                        <td class="text-center">
                                                            <a href="#" onclick="alert({{ $contato->id }})"><i class="fa fa-eye"></i></a>
                                                        </td>

{{--                                                        @if (isset(auth()->user()->dev) && auth()->user()->dev)--}}
{{--                                                            <td><i class="fa {{ @$contato->dev ? 'fa-check' : 'fa-fail' }}"></i></td>--}}
{{--                                                        @endif--}}
{{--                                                            <a href="#" onclick="visualizarEnterprise({{ $contato->empresa_id }})"><i class="fa fa-eye"></i></a>--}}
{{--                                                            <a href="{{ route('enterprise.enterprise_edit', $contato->empresa_id) }}"><i class="fa fa-edit"></i></a>--}}
                                                            {{--<a href="#" onclick="deletarEnterprise({{ $contato->empresa_id }})"><i class="fa fa-thrash"></i></a>--}}

                                                    </tr>
                                                @endforeach
                                            @endif

                                            </tbody>
                                        </table>
                                        {!! $contatos->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
