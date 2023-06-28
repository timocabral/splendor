<?php
/*
Plugin Name: Splendor Full Stack
Description: ShortCode que exibe o usuário logado e a data e a hora
Version: 0.1
Author: Thymochenko Cabral Carvalho.
*/
/*
Como exibir o shortcode?
dentro de um arquivo .php
<?php echo do_shortcode( '[splendor_fullstack]' ); ?>
dentro de algum pagebuilder
[splendor_fullstack]
*/
final class SplendorFullStack {
    
    private static WP_User $user;
    private static string $dateFormated;
    CONST PLUGIN_NAME = "splendor_fullstack";

    public static function init(){
        self::$user = wp_get_current_user();
        if(self::$user->exists()){
            $dataAtual = self::getDataAtual();
            $userName = self::getName();
            return "Olá User: {$userName} Hoje São: {$dataAtual}";
        }else{
            return "Não há usuário Logado";
        }
    }
    
    public static function getDataAtual(): string {
        if(isset(self::$user)){
            $now = new DateTime();
            self::$dateFormated = $now->format('d/m/Y H:i');
            return self::$dateFormated;
        }
    }

    public static function getName(): string {
        if(isset(self::$user)){
            return self::$user->user_login;    
        }
    }
}

add_action('init', function(){
    if(!shortcode_exists(SplendorFullStack::PLUGIN_NAME)){
        add_shortcode(SplendorFullStack::PLUGIN_NAME, [SplendorFullStack::class, 'init']);
    }
  }
);

