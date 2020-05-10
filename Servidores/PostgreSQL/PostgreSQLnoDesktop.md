Para quem está acostumado ao mysql usar o postgresql é um pouco diferente
No meu caso estou usando a versão 11 do PostgreSQL. Verifique a sua

Vou mostrar os passos no Linux. Provavelmente no Windows apenas não se usa o sudo, as barras que são o contrário (\) e os caminhos

Após a instalação

Acessar o terminal

sudo su

Acessar como postgres, usuário iniciap padrão

su - postgres

Acessar a console do postgresql

psql

Atribuir a senha 'postgres' para o usuário 'postgres'

alter role postgres password 'postgres';

Sair da console
\q

Ajustar p pg_hba.conf. No windows pode ser feito no modo gráfico com o Notepad++
Sair do usuário postgres
exit
cd /etc/postgresql/11/main
nano pg_hba.conf

Role a tela até chegar na linha
local   all             postgres                                peer

Aqui precisamos alterar apenas o método de autenticação de peer para md5
Salvar com Ctrl+O e sair com Ctrl+X

Reiniciar o serviço
service postgresql restart

exit
Pronto. Já podemos acessar o PostgreSQL localmente usando
user - postgres
senha - postgres

Para acessar o postgresql que está na sua máquina de qualquer máquina da rede ou inteernet, precisa configurar o

/etc/postgresql/11/main/postgresql.conf

Descomentando a linha abaixo e alterando

listen_address = 'IP'

Para rodar o postgresql com php precisa instalar a extensão

sudo apt install php7.3-pdo-pgsql

