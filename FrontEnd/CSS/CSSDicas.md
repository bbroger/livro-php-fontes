# Introdução ao CSS

## Seletores

O HTML tem tags e o CSS tem seletores.

Seletores são nomes usados para mudar o específico estilo de um elemento.

Cada seletor tem pelo menos uma propriedade e seu respectivo valor:
```css
seletor {
    propriedade: valor;
}
```
Tipos de seletores
- id (único por página)
- classe (um ou mais por página )
- elemento do HTML

## Comentários
```css
/* ...
...
*/
```
## Margens

```css
    margin-top
    margin-right
    margin-bottom
    margin-left


    background-color
    background-image
    background-repeat
    background-attachment
    background-position
```
## Box Model
```css
<!DOCTYPE html>
<html>
<head>
<style>
div {
  background-color: lightgrey;
  width: 300px;
  border: 15px solid green;
  padding: 50px;
  margin: 20px;
}
</style>
</head>
<body>
```
## Unidades de medida
### Absolutas: 
cm, mm, in, px, pt, pc

### Relativas:
```css
em Relativo para o tamanho da fonte do elemento (2em significa 2 vezes o tamanho da fonte atual) 
ex Relativo para o x-height da fonte atual (rarramente usado) 
ch Relativo para o width do "0" (zero) 
rem Relativo para o tamanho da fonte do elemento raiz
vw Relativo para 1% do width do viewport* 
vh Relativo para 1% da height do viewport* 
vmin Relativo para 1% a menor dimensão do viewport's*
vmax Relativo para 1% da maior dimensão do viewport's*
% Relativo para o elemento pai
```
Dica: Quando o valor for zero não requer a unidade.

## Seletores Agrupadas

Várias classes e um elemento agrupados com uma única propriedade:

No exemplo abaixo, h2, Classe1 e Classe2 terão a cor vermelha no texto
```css
h2, .Classe1, .Classe2 {
    color: red;
}
```
## Seletores Aninhados

No exemplo abaixo criamos o id topo e em seguida tratamos os h1 dentro dele e os p
```css
#topo {
        background-color: #ccc;
        padding: 1em
}

#topo h1 {
        color: blue;
}
```
Todos os h1 dentro de #topo serão de cor blue
```css
#topo p {
        color: red;
        font-weight: bold;
}
```
Todos os p dentro de #topo serão de cor red e negrito
```css
div p strong a {
    color: red;
}
```
Somente o a dentro de strong, que está dentro de p, que está dentro de div
```css
#top p {
    color: red;
    font-weight: bold;
}
```
Somente o p dentro de #top

## Pseudo Classes
```css
selector:pseudo_class { 
    property: value; 
}
```
Exemplos:
```css
a:link {
    color: blue;
}
```
Mudar a cor de todos os links para azul
```css
a:visited {
    color: purple;
}
```
Mudar os links visitados para purple
```css
a:active {
    color: red;
}
```
Mudar os links ativos para red
```css
a:hover {
    text-decoration: none;
    color: blue;
    background-color: yellow;
}
```
Aplicar quando os links receberem o foco do ponteiro do mouse (hover)
```css
input:focus, textarea:focus {
    background: #eee;
}
```

## Primeiro filho
```css
p:first-child {
    font-weight: bold;
    font-size: 40px;
}
```
Quando desejamos o estilo somente no primeiro parágrafo
```css
p {
    font-size: 12px;
}

p:first-letter {
    font-size: 24px;
    float: left;
}
```
Somente o primeiro seré 24px e left e os demais com 12px
```css
p:first-line {
    font-weight: bold;
}
```
CSS3 adicionou last-child, target, first-of-type e outros.


## Escrevendo Código CSS

O código CSS é escrito em 3 tipos de seletores, rescrevendo elementos do HTML e também criando classes e IDs.
```css
seletor{
	propriedade: valor;
}
```
Reescrevendo elementos
```css
body{
        background-color: black;
}
```
Criando classes
```css
.classe1{
	color: red;
}
```
Criando ID
```css
#meuid{
	color: blue;
}
```

## Importane
Classes e IDs são seletores criados para serem usados junto ao HTML e então alterar sua formatação ou posições. Já os seletores com elementos estes já alteram automaticamente o comportamento dos respectivos elementos no HTML, sem precisar fazer mais nada, apenas incluir o arquivo CSS com os tais seletores. O ID e a classe precisam ser usados no HTML.

Podemos ter várias combinações entre estes:
```css
h1, h2, p {
  text-align: center;
  color: red;
}

h1, h2, .cls {
  text-align: center;
  color: red;
}
```

## Posição
```css
    static
    relative
    fixed
    absolute
    sticky
```
## Float - https://www.w3schools.com/css/css_float.asp

Alinhaento
```css
.center {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
}
```
## Texto
```css
.center {
  text-align: center;
  border: 3px solid green;
}
```
## Imagem
```css
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 40%;
}
```
Esquerda e direita com position
```css
.right {
  position: absolute;
  right: 0px;
  width: 300px;
  border: 3px solid #73AD21;
  padding: 10px;
}

.left {
  position: absolute;
  left: 0px;
  width: 300px;
  border: 3px solid #73AD21;
  padding: 10px;
}
```
Usando float
```css
.right {
  float: right;
  width: 300px;
  border: 3px solid #73AD21;
  padding: 10px;
}
```
Centralizar na vertical
```css
.center {
  padding: 70px 0;
  border: 3px solid green;
}
```
Centralizar texto na vertical e na horizontal
```css
.center {
  padding: 70px 0;
  border: 3px solid green;
  text-align: center;
}
```
Com line-height
```css
.center {
  line-height: 200px;
  height: 200px;
  border: 3px solid green;
  text-align: center;
}

/* If the text has multiple lines, add the following: */
.center p {
  line-height: 1.5;
  display: inline-block;
  vertical-align: middle;
}

.center p {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
```
Com flexbox
```css
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
  border: 3px solid green;
}
```
Sprites
```css
<style>
#home {
  width: 46px;
  height: 44px;
  background: url(img_navsprites.gif) 0 0;
}

#next {
  width: 43px;
  height: 44px;
  background: url(img_navsprites.gif) -91px 0;
}
</style>
</head>
<body>

<img id="home" src="img_trans.gif" width="1" height="1"><br><br>
<img id="next" src="img_trans.gif" width="1" height="1">


<!DOCTYPE html>
<html>
<head>
<style>
#navlist {
  position: relative;
}

#navlist li {
  margin: 0;
  padding: 0;
  list-style: none;
  position: absolute;
  top: 0;
}

#navlist li, #navlist a {
  height: 44px;
  display: block;
}

#home {
  left: 0px;
  width: 46px;
  background: url('img_navsprites.gif') 0 0;
}

#prev {
  left: 63px;
  width: 43px;
  background: url('img_navsprites.gif') -47px 0;
}

#next {
  left: 129px;
  width: 43px;
  background: url('img_navsprites.gif') -91px 0;
}
</style>
</head>
<body>

<ul id="navlist">
  <li id="home"><a href="default.asp"></a></li>
  <li id="prev"><a href="css_intro.asp"></a></li>
  <li id="next"><a href="css_syntax.asp"></a></li>
</ul>

</body>
</html>


#home a:hover {
  background: url('img_navsprites_hover.gif') 0 -45px;
}

#prev a:hover {
  background: url('img_navsprites_hover.gif') -47px -45px;
}

#next a:hover {
  background: url('img_navsprites_hover.gif') -91px -45px;
}
```

## Cor de bordas de inputs text
```css
input[type=text] {
  border: 2px solid red;
  border-radius: 4px;
}
```
## Design Responsivo

Viewport - O viewport é a área visível do user de uma web page, que definimos na tag <head>.
O viewport para o device celular será menor em um mobile phone do que em uma tela de computador.
https://pt.stackoverflow.com/questions/272210/o-que-%C3%A9-view-port

Usar este:
<meta name="viewport" content="width=device-width, initial-scale=1.0">


É muito importante atualmente criar sites responsivos, ou seja, que se ajustem automaticamente ao tamanho do dispositivo que acessa nosso site. Podemos ver isso redimensionando a janela do navegador. Sites responsivos se ajustam ao tamanho do dispositivo.

Como existem uma grande quantidade de usuários que atualmente acessa sites através de celulares, então se nosso site não for responsivo ele fica muito ruim de ser acessado através de um celular. 

Existem muitas boas informações sobre como criar sites responsivos
- https://www.hostinger.com.br/tutoriais/criar-site-responsivo-css 
- http://www.carloshps.com.br/blog/criar-site-responsivo-com-html5-e-css3-parte-1-de-3/ 
- https://marketingdeconteudo.com/como-criar-uma-pagina-web-responsiva/ 

Uma dica interessante é sobre imagens: quando usar imagens em site responsivo use o tamanho com % e não especifique a altura, mas somente a largura com porcentagem. Assim o navegador calculará automaticamente a altura proporcionalmente a largura.
- https://www.w3schools.com/css/css_rwd_intro.asp

Detalhes:
- http://blog.popupdesign.com.br/design-responsivo-i-o-que-e-e-por-que-usar/ 
- http://blog.popupdesign.com.br/desenvolvimento-responsivo-e-viewport/ 
- http://blog.popupdesign.com.br/palestra-design-e-desenvolvimento-responsivo/ 

Compatibilidade com navegadores

Praticamente cada um dos navegadores implementa as propriedades a sua maneira e quando criamos um CSS e setamos valores para propriedades e usamos nosso CSS numa página aparece diferente do que fizemos. Isso mostra duas coisas, que precisamos resetar os valores de propriedades dos navegadores logo no início do nosso CSS e mais ainda que deve ser indicativo de uso de bons frameworks como o BootStrap e o jQuery, pois estes já corrigem a compatibilidade com os navegadores.

opacidade
```css
div {
  opacity: 0.5;
}
div.first {
  background: rgba(76, 175, 80, 0.1);
}
```

web fonts
```css
@font-face {
  font-family: myFirstFont;
  src: url(sansation_light.woff);
  font-weight: bold;
}

div {
  font-family: myFirstFont;
}
```


