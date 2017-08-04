# desafio-ditech
Desafio Ditech - sistema de fila virtual para uso de salas de reuniões

INSTALAÇÃO

1. Clonar o projeto
  $ git clone https://github.com/EvertonHilario/desafio-ditech.git
  
2. Criar a base de dados
  dump/init.sql
  
3. Configura a conexão com a base de dados
  protected/config/database.php
  
4. Acesse o sistema com o user e password default
  user: teste@teste.com
  password: 123456

O DESAFIO 

  Desenvolva em PHP, um sistema que resolva o seguinte problema:

  Devido ao grande fluxo de funcionários de uma empresa, foi identificado a necessidade de um sistema de fila virtual para uso de salas de reuniões.

Este sistema deve obedecer os seguintes requisitos:

1. Possuir cadastro de usuários (crud)
2. Possuir cadastro de salas (crud)
3. Login de usuários
4. O sistema deve possuir uma interface em html.
5. Reserva de salas por usuários
6. Após logado, usuário poderá efetuar reserva de salas.
7. Deverá possuir uma visualização de todas as salas e os horários vagos e ocupados.
8. Um usuário não pode reservar mais de 1 sala no mesmo período
9. 1 sala não pode estar reservado por mais de 1 usuário no mesmo período, simultaneamente.
10. As reservas de salas tem duração de 1 hora, ou seja, posso reservar a sala as 14:00, e ela estará “bloqueada” para reserva até o próximo horário 15:00.
11. Deverá ser possível a remoção da reserva de uma sala apenas pelo próprio reservante.

O sistema deverá ser versionado no gitlab.com ou github.com, com commits frequentes e explicativos. Deverá possuir um dump do banco de dados versionado dentro do arquivo dump/init.sql de seu projeto, para que possa ser implementado e testado em um servidor local.

Instruções

1. Você deverá desenvolver um sistema em PHP que resolva o problema descrito no PDF em anexo;
2. O sistema deverá ser versionado no gitlab.com ou github.com.
