# HTML
```html
Version     Specification               Release Date
1.0         N/A                         1994-01-01
2.0         RFC 1866                    1995-11-24
3.2         W3C: HTML 3.2 Specification 1997-01-14
4.0         W3C: HTML 4.0 Specification 1998-04-24
4.01        W3C: HTML 4.01 Specification 1999-12-24
5           WHATWG: HTML Living Standard 2014-10-28
5.1         W3C: HTML 5.1 Specification  2016-11-01
```
https://goalkicker.com/HTML5Book

O que ficou obsoleto
https://html.spec.whatwg.org/multipage/obsolete.html

## Tags, Elementos e Atributos

Tags - Um documento HTML é formado de tags, tags de abertura e de fechamento. Algumas poucas tags não têm fechamento como <br> e <hr>,  idealmente escritas assim <br/> e <hr/>.

Abertura - <body>

Fechamento - </body>

<!DOCTYPE html> - é uma linha de declaração de tipo de documento, no caso HTML5 - doctype.

Tipos de DOCTYPE
http://gabsferreira.com/pra-que-serve-a-tag-doctype-em-arquivos-html/ 

Atributos - Atributos adicionam informações extras para as tags e ficam sempre na tag de abertura.
<tag atributo="valor">Título</tag>

Elementos - Os elementos são delimitados por tags de abertura de de fechamento. Um elemento é composto por uma tag de abertura, por seus atributos, seu conteúdo e pela tag de fechamento.

Exemplo de elemento:
<title>Aqui fica o título da página, que aparece no navegador</title>

Tipos de tags/elementos:
- Doctype
- Metadados
- Body
	- Tags semânticas

Metadados – são as tags que ficam entre <head> e </head> - que não alteram nada no conteúdo, apenas passam informações silenciosas para o navegador:
   <head>
       <meta charset="utf-8"/>
       <title>Formulário de Demonstração HTML5</title>
   </head>
charset diz ao navegador que interprete o conteúdo da página com o conjunto de caracteres utf-8

<title> define o título da página que aparecerá na primeira linha no navegador.
Meta tags são etiquetas para marcam e descrevem informações relacionadas ao website para que determinadas aplicações possam utilizadas.
Só para você ter uma ideia as meta tags são responsáveis por informar sobre dados como uma descrição do conteúdo da página, seu autor, data de criação, entre outras informações.

Você com certeza já presenciou o resultado de uma aplicação que utilizou de informações inseridas em meta tags, como por exemplo, o texto que descreve sobre uma página em um resultado de busca no Google.

As meta tags são inseridas entre as tags de abertura e fechamento do elemento Head. E se trata de um elemento vazio que abriga atributos com diferentes valores e funcionalidades.

A seguir um exemplo de sintaxe de código para inserção de meta tag.
<meta name="description" content="Um canal de conteúdos sobre Web Design, Front-End, Design, Comunicação e Criatividade em geral. Acesse, curta e compartilhe nossos conteúdos!! Por que Qualquer Um Acha Que Pode Dar Pitacos, Né ??">

Body – é a tag onde fica todo o conteúdo do site, o texto, as imagens, áudio, vídeo, tabelas, formulários, etc.

Tags semânticas – Estas tags ficam dentro da tag body. Inclusive podemos criar regiões na página com elas para cabeçalho (<header>), menu (<nav>), barras laterais (<aside>), rodapé (<footer>), etc. Veja exemplo logo abaixo. A finalidade é a de organizar o código.

## Tags semânticas 
O HTML5 trouxe várias tags semânticas para juntar à div: article, header, footer, section, etc. 

A quantidade de sites e páginas na web crescem dia após dia, mas, junto com o crescimento da web também cresce os padrões, técnicas e principalmente melhores práticas de desenvolvimento. Uma dessas práticas que foi adicionada para a web seria dar semântica (sentido) á nossas páginas, hoje por exemplo leitores de tela conseguem saber o que significa cada pedaço de nosso site.

Possuír um HTML bem escrito e com uma boa semântica, hoje é fundamental para a maioria (senão todos) dos sites e aplicações web (webapp’s), além de conseguir melhores posições no rank da Google, também ajudamos pessoas com deficiência, ou seja, estamos pensando também em acessibilidade.
https://medium.com/collabcode/meu-html-%C3%A9-sem%C3%A2ntico-e-o-seu-4e97c81c0c49 

Sempre gosto de salientar para as pessoas que a maior evolução do HTML5 foi na sua semântica.
https://medium.com/@eduagni/html5-entendendo-a-estrutura-e-a-sem%C3%A2ntica-db5f17808c7

Novidade que o HTML 5 trouxe:

http://www.devmedia.com.br/as-novidades-do-html5/23992 

https://www.w3schools.com/hTML/html5_new_elements.asp 

Novos tipos de campos trazidos pelo HTHML 5

required – Configura para que um campo tenha preenchimento obrigatório
<input type="text" name="nome" required>

pattern – Configura um campo para que seja avaliado de acordo com uma expressão regular
<input type="text" pattern="^@\w{2,}" name="usuario_twitter">
email
<input type="email" name="email">

number
<input type="number" max="100" step="5">

url
<input type="url" name="endereco">

range
<input type="range" name="volume">

date, month, week, time, datetime e datetime-local

<input type="date" name="validade">

color
<input type="color" name="cor_olhos">

search
<input type="search" results="10">

tel
<input type="tel" name="telefone">

Comentários no HTML

<!-- Comentários para uma ou mais linhas, que termina com -->

Link para e-mail (abre um cliente de e-mail para envio)
<a href="mailto:ribafs@gmail.com?Subject='E-mail de teste'">Contato</a>	


## Integração entre HTML, CSS e JavaScript
```html
<!DOCTYPE html>
<html lang="pt">
   <head>
       <meta charset="utf-8"/>
       <title>Integração entre HTML, CSS e JavaScript</title>
   </head>
<body>

<h1 align="center">Integração entre HTML, CSS e JavaScript</h1>	

<p>Parágrafo HTML puro.</p>

<p id='some-paragraph'>Isto é um parágrafo formatado pelo CSS. Clique aqui para ver uma ação do JavaScript.</p>

<style>
p#some-paragraph {
  font-size: 20px;
  color: blue;
}
</style>

<script>
var p = document.getElementById('some-paragraph');
p.addEventListener('click', function(event) {
  p.innerHTML = 'Você clicou aqui!';
});
</script>
```

Download de vídeo
<a href="vídeo.mpg” download>

ou
<a href="vídeo.mpg” download="true">

