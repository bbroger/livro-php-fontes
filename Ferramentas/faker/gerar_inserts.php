<?php
ini_set('max_execution_time', '-1');// Ilimitados
ini_set('max_input_time', 120);// s
ini_set('max_input_nesting_level', 64);//s
ini_set('memory_limit', '-1');//Ilimitada?

// require the Faker autoloader
require_once 'vendor/autoload.php';
// alternatively, use another PSR-0 compliant autoloader (like the Symfony2 ClassLoader for instance)

// use the factory to create a Faker\Generator instance
//$faker = Faker\Factory::create();
$faker = Faker\Factory::create('pt_BR');

$cliente = "CREATE TABLE clientes (
    id int primary key auto_increment,
    nome varchar(50),
    email varchar(50),
    nascimento date,
    cpf varchar(15)
);\n\n";

$cliente .= "INSERT INTO clientes (nome, email, nascimento, cpf) VALUES \n";

for ($i=0; $i < 1000000; $i++) {
    $nome = addslashes($faker->name);
    $email = $faker->email;
    $nascimento = $faker->date;
    $cpf = $faker->numberBetween($min = 10000000000, $max = 99999999999);

    if($i<999999){
        $cliente .= "('$nome', '$email', '$nascimento', '$cpf'),\n";
    }else{
        $cliente .= "('$nome', '$email', '$nascimento', '$cpf');\n";
    }
}

$fp = fopen("clientes.sql", "w");
$escreve = fwrite($fp, $cliente);
fclose($fp);

print 'Arquivo criado';

/*
Pesquisei várias alternativas para produção da dados/registros para testes aleatórios para bancos/sql.

Fui desde o generatedata.com, passei por stored procedures, pela criação de arquivos sql usando funções do php para gerar strings e datas aleatórias.
O generatedata.com é muito bom mas online somente gera 100 registros e eu quero gerar um milhão.
Stored procedures e funções do php geram dados bem longe de parecer com dados reais.
Acontece que alguém já havia pensado e investido muito neste assunto e foi a melhor alternativa encontrada, a biblioteca Faker:
https://github.com/fzaninotto/Faker

Muitos recursos para o assunto. Ela já tem variáveis e objetos para vários tipos de dados: nome, email, data, endereço, cidade, estado, pais, etc. 
Sem contar que gera dados localizados, bem aprecidos com dados reais, com nomes brasileiros, por exemplo.
É tanto que esta bibliteca atualmente é utilizada por diversos frameworks.

Instalar Fake: (requer o composer instalado globalmente)

mkdir /var/www/html/faker
cd /var/www/html/faker
composer require fzaninotto/faker

Agora crie o arquivo acima como index.php na pasta onde instalou o faker, contendo o código para geração dos registros.
Aproveitei e adicionei a criação da tabela.

Outros tipos de dados, para outras tabelas:

echo $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}').'<br>'; // sm0@y8k96a.ej
echo $faker->randomElement($array = array ('a','b','c')).'<br>'; // 'b'
echo $faker->words($nb = 3, $asText = false).'<br>';
echo $faker->sentence($nbWords = 6, $variableNbWords = true).'<br>';
echo $faker->address.'<br>'; // rua, número e cep
echo $faker->text.'<br>'; // Para grandes quantidades de texto
echo $faker->sentence($nbWords = 6, $variableNbWords = true).'<br>';
echo $faker->text($maxNbChars = 200).'<br>';
echo $faker->title($gender = null|'male'|'female').'<br>';     // 'Ms.'
echo $faker->name($gender = null|'male'|'female').'<br>';      // 'Dr. Zane Stroman'
echo $faker->cityPrefix.'<br>';
echo $faker->state.'<br>';
echo $faker->stateAbbr.'<br>';
echo $faker->buildingNumber.'<br>';
echo $faker->city.'<br>';
echo $faker->streetName.'<br>';
echo $faker->streetAddress.'<br>';
echo $faker->postcode.'<br>';
echo $faker->country.'<br>';
echo $faker->PhoneNumber.'<br>';
echo $faker->company.'<br>';
echo $faker->date($format = 'Y-m-d', $max = 'now').'<br>';
echo $faker->time($format = 'H:i:s', $max = 'now').'<br>';
echo $faker->freeEmail.'<br>';
echo $faker->password.'<br>';
echo $faker->domainName.'<br>';
echo $faker->url.'<br>';
echo $faker->ipv4.'<br>';
echo $faker->macAddress.'<br>';
echo $faker->creditCardType.'<br>';
echo $faker->creditCardNumber.'<br>';
echo $faker->creditCardExpirationDateString.'<br>';
echo $faker->hexcolor.'<br>';
echo $faker->colorName.'<br>';
echo $faker->fileExtension.'<br>';
echo $faker->mimeType.'<br>';
echo $faker->locale.'<br>';
echo $faker->countryCode.'<br>';
echo $faker->randomHtml(2,3).'<br>';

Demora para criar o arquivo com um milhão de registros, dependendo do computador demora mais ou menos
Num micro com 4GB de RAM, core i3 ele demorou 20 minutos para gerar o arquivo.

Quanto alterei para usar pt_BR o tempo aumentou para 26 minutos e o tamanho do arquivo de 76MB para 86MB.
Mas valeu a pena pois a opção localizada gera dados mais parecidos com os nossos reais no Brasil.

Para dar uma ideia: para abrir o arquivo no gedit levou 4 minutos.

*/
