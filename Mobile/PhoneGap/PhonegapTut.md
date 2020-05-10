Criando aplicativos web híbridos com o Phonegap

Instalar o Phonegap CLI
sudo npm install -g phonegap
sudo npm install -g phonegap@latest

Criar um aplicativo (requer conexão à internet, pois baixa o esqueleto do servidor)
phonegap create breakout org.ribafs.breakout Breakout

Instalar aplicativo no celular
https://play.google.com/store/apps/details?id=com.adobe.phonegap.app

phonegap help             Displays the full help text
phonegap help <command>   Displays help text for a specific command
phonegap <command> help   Displays help text for a specific command
phonegap <command> --help Displays help text for a specific command
phonegap <command> -h     Displays help text for a specific command

$ phonegap help create
$ phonegap create help
$ phonegap create --help
$ phonegap create -h

phonegap create [options] <path> [id [name [config]]]

--name, -n <name>         application name (default: "Hello World")
--id, -i <package>        package name (default: "com.phonegap.hello-world")
--template <name>         create app using an existing app template
--copy-from, -src <path>  create project using a copy of the www folder from an existing project
--link-to <path>          symlink/shortcut to the www folder of another project without copying

$ phonegap create path/to/myApp
$ phonegap create path/to/myApp "com.example.app" "My App"
$ phonegap create path/to/myApp --id "com.example.app" --name "My App"
$ phonegap create path/to/myApp --template hello-world
$ phonegap create path/to/myApp --copy-from ../myOtherApp
$ phonegap create path/to/myApp -src ../myOtherApp
$ phonegap create path/to/myApp --id "com.example.app" --name "My App" --copy-from ~/myOtherApp
$ phonegap create path/to/myApp --link-to ../myOtherApp

phonegap remote [command]

login                login to PhoneGap Build (requires an account and your credentials)
logout               logout of PhoneGap Build
build <platform>     build a specific platform
install <platform>   install a specific platform (returns a generated QR code in the terminal)
run <platform>       build and install a specific platform

$ phonegap remote login
$ phonegap remote build ios
$ phonegap remote install android
$ phonegap remote run ios
$ phonegap remote logout

phonegap serve [options]

--port, -p <n>       port for web server (default: 3000)
--autoreload         enable app refresh on file changes (default: true)
--no-autoreload      disable app refresh on file changes
--browser            enable desktop browser support (default: true)
--no-browser         disable desktop browser support
--localtunnel        enable a local tunnel for public access (default: false)

phonegap app

$ phonegap serve
$ phonegap serve --port 1337
$ phonegap serve --no-autoreload
$ phonegap serve --browser
$ phonegap serve --no-browser
$ phonegap serve --localtunnel
$ phonegap app

phonegap template list

$ phonegap template list
$ phonegap create myApp --template hello-world
$ phonegap create myApp --recipe hello-world

phonegap cordova <command>

$ phonegap cordova serve

Atualizar:
phonegap -v
sudo npm install -g phonegap
phonegap -v


Build
https://build.phonegap.com/

== Resumindo:

sudo npm install -g phonegap
phonegap -v

phonegap create breakout "org.ribafs.brakout" "Breakout" --template hello-world

cd breakout
phonegap remote login

phonegap serve --browser

PhoneGap
http://phonegap.com
http://build.phonegap.com
http://docs.phonegap.com/
http://docs.phonegap.com/references/phonegap-cli/
http://docs.phonegap.com/references/phonegap-cli/install/
http://docs.phonegap.com/phonegap-build/
https://phonegap.com/app/
http://docs.phonegap.com/references/developer-app/
http://configap.com/

PhoneGap suporta iOS, Android, Blackberry e Windows Phone

Requisitos:
nodejs - https://nodejs.org/en/

Requisitos de conhecimento
Precisamos conhecer HTML, CSS e Javascript.

Instalação do PhoneGap Desktop App

Phonegat Desktop App - https://github.com/phonegap/phonegap-app-desktop/releases

Windows 7 e 8.1 usar a versão 0.3.5

Windows 10 suporta a última versão, que é a 0.4.4


O phonegap cria aplicativos localmente e gera o build na nuvel (build.phonegap.com), sem necessidade de instalar o Android localmente.
Tem uma interface para a linha de comando e uma IDE somente para Windows e Mac, apenas com recursos de criar e abrir no navegador.

Este site é um serviço nas nuvens que armazena os build que criamos dos aplicativos.
Isso torna a criação de aplicativos mobile muito mais simples, sem necessidade da trabalheira de instalar e configurar o android localmente.

https://www.youtube.com/watch?v=dmDRZx-2xJE

Instalar o Phonegap
npm install -g phonegap

Criar um aplicativo (requer conexão à internet, pois baixa o esqueleto do servidor)
phonegap create app1 org.ribafs.app1 App1

Outras variações
phonegap create path/to/myApp
phonegap create path/to/myApp "com.example.app" "My App"
phonegap create path/to/myApp --id "com.example.app" --name "My App"
phonegap create path/to/myApp --template hello-world
phonegap create path/to/myApp --copy-from ../myOtherApp
phonegap create path/to/myApp -src ../myOtherApp
phonegap create path/to/myApp --id "com.example.app" --name "My App" --copy-from ~/myOtherApp
phonegap create path/to/myApp --link-to ../myOtherApp

phonegap create pasta pacote NomeApp
phonegap create hello org.ribafs.hello HelloWorld

phonegap create agenda org.ribafs.agenda Agenda

Estrutura de diretórios

hooks - scripts adicionais
platforms - código do build de plataformas
plugins - código dos plugins usados
www - código fonte da app
config.xml - 

Cadastrar-se em
https://build.phonegap.com/

Emulador para Chrome
http://emulate.phonegap.com
Acesse e instale no chrome (somente).

Instalar servidor web (para criar aplicativo com PhoneGap com PHP e MySQL)

http://localhost/app1

Build remoto
https://build.phonegap.com/apps

cd app1
phonegap remote login

phonegap remote build android

ou (com celular conectado via cabo USB e usando a app do PhoneGap)
Também devemos habilitar o modo de debug no celular Android
phonegap run android --verbose

phonegap remote run android

phonegap run android --device=<codigo>

Ver os códigos dos dispositivos conectados ao computador
adb devices

Após o deploy podemos instalar o aplicativo.
Basta acessar o site build, baixar o apk e instalar manualmente no aparelho.
Podemos baixá-la via QRCode (mais prático).

Também podemos compactar toda a pasta do app e fazer o upload no site build.
Em Private - Upload a zip file.

Para excluir um app clicar no ícone - Settings e ao final Delete.
Após excluir requer Refresh no navegador para permitir upload de nova app.

Download do apk
No site build clique sobre o ícone da aplicação
Abaixo aparece um ícone azul para download do APK
Talbém aparece um botão Install abaixo do QRcode onde podemos baixar o APK

No site build podemos efetuar alterações nas configurações e depois clicar no botão Build para atualizar

Gerando uma keystore
keytool -genkey -v -keystore [keystore_name].keystore -alias [alias_name] -keyalg RSA -keysize 2048 -validity 10000

Exemplo
keytool -genkey -v -keystore Agenda.keystore -alias agenda -keyalg RSA -keysize 2048 -validity 10000

Emulando no celular, via app

Para que funcione precisamos instalar um acelerador gráfico via sdkmanager
android-studio/bin/studio.sh
Configurações/SDK
Sdk/Extras, o último da lista
Intel x86 Emulator Accelerator  

phonegap emulate android

phonegap remote logout

Existe um app emulador
http://docs.phonegap.com/references/developer-app/ ou buscando phonegap pelo celular

Testar aplicativos em emulador
phonegap serve [options] (no windows desabilitar o firewall ou permitir este)

--port, -p <n>       port for web server (default: 3000)
--autoreload         enable app refresh on file changes (default: true)
--no-autoreload      disable app refresh on file changes
--browser            enable desktop browser support (default: true)
--no-browser         disable desktop browser support
--localtunnel        enable a local tunnel for public access (default: false)

Após abrir o aplicativo apenas execute:
cd pastaapp
phonegap serve

As alterações fetias no código fonte no computador são percebidas automaticamente no app do celular

Ambos, celular e computador devem estar na mesma rede

Neste caso o app aparece no celular.
Cadastro de Clientes
https://www.youtube.com/watch?v=CgidH4qFxiM&index=1&list=PLTmK6lyvWo8g3v40gJADMdUUTt8p2t5G3

Listar plataformas disponíveis

phonegap platform

Adicionar suporte para a plataforma android

phonegap platform add android
Com isso ele cria uma pasta com o projeto na nossa pasta platform. Este projeto criado pode ser importado pelo Android Studio.

App Controle de Estoque
https://www.youtube.com/watch?v=XHOh0F9HLKo&index=15&list=PLTmK6lyvWo8g3v40gJADMdUUTt8p2t5G3

https://www.youtube.com/watch?v=dmDRZx-2xJE
http://loiane.com/2014/02/curso-online-phonegap-gratuito/

Phonegap Desktop App

Requer a instalação do phonegap via npm antes.

Emulador do Blackberry no navegador - Ripple
sudo npm install -g ripple-emulator
https://chrome.google.com/webstore/detail/ripple-emulator-beta/geelfhphabnejjhdalkjhgipohgpdnoc

ripple emulate
Bom para testar plugins

Para que funcione requer adição do android como plataforma
phonegap platform add android

Debugando com Gapdebug (Win e Mac)
http://genuitec.com/products/gapdebug

Debugar no navegador de aplicativo no celular

Aula 16

Plugin Bateria

Instalar
Criar o app
phonegap create bateria org.ribafs.bateria StatusBateria

Ver documentação no site do cordova
https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-battery-status/index.html

Atualizar o cordova
sudo npm install -g cordova

cordova plugin add cordova-plugin-battery-status

Ao instalar ele cria uma pasta com os fontes para cada uma das plataformas suportadas.

Mudar o início da tag <body> em www/index.html para:

<body>
    <div class="app">
        <h1>Exemplo Plugin Bateria</h1>
        <div id="deviceready" class="blink">
            <p>Porcentagem Bateria<span id="level">%</span></p>
            <p>Dispositivo plugado<span id="isPluged"></span></p>
        </div>
    </div>

Em js/index.js

Mudar este evento:

    receivedEvent: function(id) {
        window.addEventListener("batterystatus", onBatteryStatus, false);

        function onBatteryStatus(status) {
            console.log("Level: " + status.level + " isPlugged: " + status.isPlugged);
        }
    }

Testando este app
O emulador ripple é uma boa saída para testar.

Lembrando: este evento somente é disparado quando o estado da bateria muda ou quando o isPlugged muda, portanto a melhor alternativa é o ripple.

Lembrando que para que o ripple funcione requer que o android seja adicionado ao app.

phonegap platform add android

Também precisa estar no diretório web.


Plugin Device

Acessar informações sobre o aparelho: SO, versão, versão do cordova, marca, etc.
https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-device/index.html

App
phonegap create device org.ribafs.device DevicePlugin

Instalação
cordova plugin add cordova-plugin-device

O objeto do plugin device tem escopo global e pode ser chamado de qualquer parte do app.

Plugin Dialogs
Recomendado para todas as aplicações.
https://cordova.apache.org/docs/en/latest/reference/cordova-plugin-dialogs/index.html

App
phonegap create dialogos org.ribafs.dialogos PluginDialogs

Instalar
cordova plugin add cordova-plugin-dialogs

Obs.: estes exemplos com plugins não funcionam no navegador, nem no emulador ripple, somente no dispositivo real.


jQuery Mobile para a camada view

Podemos criar um app ou um site e fornecer a URL para o cliente.


Templates do Phonegap

phonegap template list

phonegap create dialogos org.ribafs.dialogos PluginDialogs --template nometemplate

Criar app usando template jquerymobile
phonegap create my-app --template https://github.com/loiane/jquerymobile-phonegap-template (para isso requer git instalado na máquina)


Publicar uma app do Android no build para o Google Play

Criar a app
Criar a chave com:
cd appname
Efetuar o build pela linha de comando
keytool -genkey -v -keystore Agenda.keystore -alias agenda -keyalg RSA -keysize 2048 -validity 10000
Gerará o arquivo Agenda.keystore no raiz do aplicativo

Dica: use a mesma senha no começo e no final para facilitar.

Ir até o site do build -  https://build.phonegap.com
- Clicar no ícone do app
- Clicar em No key selected à direita do ícone do android abaixo
- Clicar em add a key...
	Entrar com um nome para o aplicativo: DNOCS - Agenda
	Entrar com o alias usado na criação da chave. Precisa ser o mesmo da chave: agenda
	Indicar o arquivo da chave, que é Agenda.keystore, na pasta do app agenda
	Clicar no pequeno cadeado amarelo (indica que está bloqueado)
	Clicar no botão Rebuild e aguarde que reconstrua com a chave
Agora está pronto para publicar no Google Play - https://play.google.com/apps/publish

Ao efetuar o build de uma app ele aparece no site do build.phonegap.com como de debug.
Mesmo assim este APK pode ser instalado manualmente sem problema. Não dá é para publicar no Google Play. Para isso precisa da chave.

Dica: esta chave/arquivo pode ser usado para outros aplicativos.

Atualizar Phonegap

phonegap -v

sudo npm install -g phonegap

sudo npm i -g npm

