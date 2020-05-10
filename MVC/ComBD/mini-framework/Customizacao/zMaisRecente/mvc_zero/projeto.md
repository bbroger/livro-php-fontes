# MVC do Zero

MVC do zero ficou somente na intenção. É que estou tão acostumado e gosto tanto do mini3, que usei a maior parte deste aplicativo de um aplicativo que havia crido derivado do mini3. Me justificando: quando você escuta uma verdade e a entende, ela agora também é sua e não somente de quem a "criou".

Mudei algumas coisas:
- Removi a classe View, incorporando seu conteúdo no controller (como é no mini3)
- Renomeei a classe Core/Model para Core/Connection, pois de fato é este seu objetivo.
- Estou usando a classe Core/Router que eu criei e não a original do mini3
- Mudei o diretório central de src para app
- Mudei o composer.json
- Ia mudar o controller de erro absorvendo a view index, mas exibir HTML no controller não é boa prática e ficou mais difícil pegar o CSS, então mantive a view index de error.



