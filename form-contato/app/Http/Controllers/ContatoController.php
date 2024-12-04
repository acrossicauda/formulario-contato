<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{


    public function index()
    {
        $contatos = Contato::orderBy('id', 'DESC')->paginate(20);
        return view('contatos', ['contatos' => $contatos]);
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }


    private function sendMailContato($dados)
    {
        $name = $dados->name;
        $email = $dados->email;
        $titulo = $dados->title;
        $assunto = $dados->description;
        // O envio de emails é feito usando o método "to" na facade Mail
        $mailTo = env('MAIL_TO_ADDRESS') ?? 'contato@acrossicauda.com.br';
        return Mail::to($mailTo)->send(new \App\Mail\SendMail($name, $email, $titulo, $assunto));

    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            //'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Contato::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
        ]);


        $contato = Contato::create([
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if($contato) {
            $this->sendMailContato($contato);
        }

        return redirect()->route('mail.success');
        //return redirect()->route('mail.success')->withSuccess(['Success Message here!']);


//        if ($contato) {
//            return redirect(view('mail.success'));
//        }
//        event(new Registered($user));

//        Auth::login($user);

//        return redirect(RouteServiceProvider::HOME);
    }
}
