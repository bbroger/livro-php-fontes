# Criando um jogo mobile de forma simples

Usando o PhoneGap CLI sem ter android instalado

Acesse

https://developer.mozilla.org/pt-PT/docs/Games/Tutorials/2D_breakout_game_Phaser

## Faça o download
https://github.com/end3r/Gamedev-Phaser-Content-Kit

## Descompacte

Acesse a pasta demos

## Abra no navegador o arquivo
lesson16.html

## Agora vamos criar um aplicativo no PhoneGap CLI

##Instalar o nodejs - http://nodejs.org/download/
```bash
sudo npm install -g phonegap
phonegap -v
phonegap create breakout "org.ribafs.breakout" "Breakout" --template hello-world
cd breakout
sudo cordova platforms add android
phonegap serve --browser
```
Ctrl+C

## Agora renomeie o arquivo lesson16.html para index.html
Edite este arquivo index.html e copie as linhas do <head>:
```html
    <title>Breakout game in Phaser</title>
    <style>* { padding: 0; margin: 0; }</style>
    <script src="js/phaser.2.4.2.min.js"></script>
    <!-- Crédito: https://developer.mozilla.org/pt-PT/docs/Games/Tutorials/2D_breakout_game_Phaser -->
```
Para o <head> do arquivo breakout/www/index.html, abaixo de: 

<meta charset="utf-8" />

Agora copie todo o início do breakout/www/index.html até o final da </head> sobrescrevendo a <head> do index.html do jogo.

De forma que o início do index.html do jogo fique assim:
```html
<!DOCTYPE html>
<!--
    Copyright (c) 2012-2016 Adobe Systems Incorporated. All rights reserved.

    Licensed to the Apache Software Foundation (ASF) under one
    or more contributor license agreements.  See the NOTICE file
    distributed with this work for additional information
    regarding copyright ownership.  The ASF licenses this file
    to you under the Apache License, Version 2.0 (the
    "License"); you may not use this file except in compliance
    with the License.  You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing,
    software distributed under the License is distributed on an
    "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
     KIND, either express or implied.  See the License for the
    specific language governing permissions and limitations
    under the License.
-->
<html>

<head>
    <meta charset="utf-8" />
    <title>Breakout game in Phaser</title>
    <style>* { padding: 0; margin: 0; }</style>
    <script src="js/phaser.2.4.2.min.js"></script>
    <!-- Crédito: https://developer.mozilla.org/pt-PT/docs/Games/Tutorials/2D_breakout_game_Phaser -->
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
    <!-- This is a wide open CSP declaration. To lock this down for production, see below. -->
    <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline' gap:; style-src 'self' 'unsafe-inline'; media-src *" />
    <!-- Good default declaration:
    * gap: is required only on iOS (when using UIWebView) and is needed for JS->native communication
    * https://ssl.gstatic.com is required only on Android and is needed for TalkBack to function properly
    * Disables use of eval() and inline scripts in order to mitigate risk of XSS vulnerabilities. To change this:
        * Enable inline JS: add 'unsafe-inline' to default-src
        * Enable eval(): add 'unsafe-eval' to default-src
    * Create your own at http://cspisawesome.com
    -->
    <!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap: 'unsafe-inline' https://ssl.gstatic.com; style-src 'self' 'unsafe-inline'; media-src *" /> -->

    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <title>Hello World</title>
</head>
```
Também copie estas linhas abaixo do arquivo breakout/www/index.html:
```html
    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript">
        app.initialize();
    </script>
```
Para a mesma região do index.html do jogo

Então copie os arquivos do jogo: index.html, a pasta img e a js para a pasta breakout/www

## Converter os ícones default para android com um dos 3 abaixo:

https://romannurik.github.io/AndroidAssetStudio/icons-launcher.html
https://appiconmaker.co
https://makeappicon.com/

Edite o arquivo breakout/config.xml

E ajuste a descrição e o autor do Jogo.

Ao final compacte como breakout.zip

Acesse:
https://build.phonegap.com/apps

Faça seu cadastro gratuitamente

Então faça login

Somente temos direito a criar um projeto e do tipo private com a conta gratuita

## Clique em Apps

- private
- Upload a .zip file - aguarde
- Read to build - aguarde. Observe que o ícone do iOS já fica vermelho, indicando que não há compatibilidade e abaixo dos ícones do Android e do Windos fica rolando uma linha azul indicando a compilação/build
- Clique no ícone da plataforma, Android, iOS ou Windows para fazer o download do .apk

Após compilar poderá fazer o download do apk e instalar em seu celular.

## Para excluir um projeto
- Clique sobre o nome do projeto
- Settings
- Role a tela e ao final clique em Delete

