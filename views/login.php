<?php \Classes\ClassLayout::setHead('Login', 'TCC Engenharia de Software Aluno:1958961-5', 'WMatos'); ?>
    <div class="fundoLog"></div>
    <form name="formLogin" id="formLogin" action="<?php echo DIRPAGE.'controllers/controllerLogin'; ?>" method="post">
           <div class="login">
               <div class="loginLogomarca float w100">
                   <div class="logomarcaimg"><img src=" <?php echo DIRPAGE.'img/unicesumar.png'; ?>" alt="Logomarca"></div>
                   <div class="title01">TCC_I e II</div>
               </div>
               <div class="resultadoFormLogin float w100 center"></div>
               <div class="loginFormulario float w100">
                   <input class="float w100 h40" type="email" name="email" id="email" placeholder="Email:" required>
                   <input class="float w100 h40" type="password" name="senha" id="senha" placeholder="Senha:" required>
                   <input class="float w100 h40" type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" required>
                   <input class="float h40 center font" type="submit" value="Entrar">
                   <div class="loginTextos float"><a href="<?php echo DIRPAGE.'cadastro';?>">Criar conta</a></div>
                   <a href="<?php echo DIRPAGE.'esqueci-meu-passe' ?>">Esqueci Minha Senha</a>
               </div>
               <div class="login-work">Trabalho acadêmico EngSoft Wellington Matos</div>
           </div>
    </form>
<?php \Classes\ClassLayout::setFooter(); ?>

