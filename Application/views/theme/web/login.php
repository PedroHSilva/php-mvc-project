<div class="container w3-blue-gray w3-display-container" style="height:100vh;">
    <div class="w3-display-middle">
        <div class="w3-center w3-padding w3-round w3-card-4 w3-text-dark-grey" style="min-width:320px; overflow:hiden; background:rgba(255,255,255, 0.7)">
        
            <h3><i class="fa fa-user-circle w3-jumbo w3-text-blue-gray" aria-hidden="true"></i></h3>
            
            <form action="<?=url('/auth/login')?>" method="post">
                <div class="w3-section">
                    <input class="w3-input w3-light-grey w3-center w3-round-large" type="email" name="email" id="email" placeholder="digite seu login">
                </div>

                <div class="w3-section">
                    <input class="w3-input w3-light-grey w3-center w3-round-large" type="password" name="password" id="password" placeholder="Digite sua senha">
                </div>
                <div class="w3-section">
                    <button class="w3-button w3-block w3-blue-gray w3-hover-dark-grey w3-round-large" type="submit">Entrar</button>
                </div>
                <hr>
                <div class="w3-section">
                    <a class="w3-section" href="#">esqueci minha senha</a>
                </div>
            </form>
        </div>
    </div>
</div>