<div class="container col-3">

    <form method="POST" action="{{ route('contato.create') }}">
        @csrf
        <div class="row text-white">
            <h1 class="">Gostaria de fazer um orçamento ou agendar uma consultoria,
                nos envie uma mensagem que logo entraremos em contato</h1>
        </div>
        <br>
        <div class="row text-white">
            <label>Digite seu nome:</label>
            <input type="text" class="form-control" name="name" value="" placeholder="ex: João" required>
        </div>
        <div class="row text-white">
            <label>Digite seu e-mail:</label>
            <input type="email" class="form-control" name="email" value="" placeholder="ex: joaoclb@gmail.com" required>
        </div>
        <div class="row text-white">
            <label>Digite o assunto:</label>
            <input type="text" class="form-control" name="title" value="" placeholder="ex: orçamento" required>
        </div>
        <div class="row text-white">
            <label>Digite sua mensagem:</label>
            <textarea class="form-control" name="description" value="" placeholder="Digite sua mensagem aqui" maxlength="1000" required></textarea>
        </div>

        <br>
        <div class="row text-white">
            @if(env('ENABLE_RECAPTCHA'))
                <!-- Div do ReCaptcha foi adicionado no final do formulário -->
                <div class="g-recaptcha" data-sitekey="{{ env('KEY_RECAPTCHA') }}"></div>
            @endif

            <input class="btn btn-secondary mr-2" type="submit">
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
    </form>
</div>
