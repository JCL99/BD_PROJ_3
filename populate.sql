
INSERT INTO local_publico VALUES (32.256345, 100.265554, 'centro comercial');
INSERT INTO local_publico VALUES (-36.451978, 023.265554, 'serra de sintra');
INSERT INTO local_publico VALUES (43.000000, 025.265554, 'palacio da pena');
INSERT INTO local_publico VALUES (-88.256345, 123.265554, 'capela nossa senhora');

INSERT INTO anomalia VALUES (1, '((1,2),(3,4))', 'image1.png', 'espanhol',    '2019-02-08 08:05:06','descr1', true);
INSERT INTO anomalia VALUES (2, '((7,7),(5,6))', 'image2.png', 'inglês',      '2019-07-08 09:05:06','descr2', true);
INSERT INTO anomalia VALUES (3, '((1,5),(3,3))', 'image3.png', 'francês',     '2019-03-08 10:05:06', 'descr3',false);
INSERT INTO anomalia VALUES (4, '((8,4),(3,4))', 'image4.png', 'português',   '2019-06-08 11:05:06', 'descr4',true);
INSERT INTO anomalia VALUES (5, '((2,8),(1,4))', 'image5.png', 'russo',       '2019-10-08 15:05:06', 'descr5',true);
INSERT INTO anomalia VALUES (6, '((5,3),(9,4))', 'image6.png', 'dinamarquês', '2019-05-08 12:05:06', 'descr6',false);
INSERT INTO anomalia VALUES (7, '((1,2),(5,4))', 'image7.png', 'russo',       '2019-08-08 17:05:06', 'descr7',false);

INSERT INTO utilizador VALUES ('toni@gmail.com', 'pass1');
INSERT INTO utilizador VALUES ('joao@gmail.com', 'pass2');
INSERT INTO utilizador VALUES ('rita@gmail.com', 'pass3');
INSERT INTO utilizador VALUES ('luis@gmail.com', 'pass4');

INSERT INTO item VALUES (1, 'falha na escrita', 'à esquerda da janela',             32.256345, 100.265554);
INSERT INTO item VALUES (2, 'troca de palavras', 'ao lado do contentor amarelo',    -88.256345, 123.265554);
INSERT INTO item VALUES (3, 'falta de vírgula', 'no centro da parede',              -88.256345, 123.265554);
INSERT INTO item VALUES (4, 'imagem trocada','no solo',                             43.000000, 025.265554);
INSERT INTO item VALUES (5, 'falta de ajustamento de texto','no teto',              -36.451978, 023.265554);

INSERT INTO incidencia VALUES (1, 1, 'joao@gmail.com');
INSERT INTO incidencia VALUES (2, 1, 'rita@gmail.com');
INSERT INTO incidencia VALUES (3, 1, 'toni@gmail.com');
INSERT INTO incidencia VALUES (4, 3, 'rita@gmail.com');
INSERT INTO incidencia VALUES (5, 2, 'toni@gmail.com');
INSERT INTO incidencia VALUES (6, 2, 'rita@gmail.com');
INSERT INTO incidencia VALUES (7, 4, 'rita@gmail.com');

INSERT INTO anomalia_traducao VALUES(1, '((14,12),(10,8))', 'frances');
INSERT INTO anomalia_traducao VALUES(3, '((1,5),(8,4))', 'portugues');
INSERT INTO anomalia_traducao VALUES(4, '((4,0),(2,8))', 'tailandes');
INSERT INTO anomalia_traducao VALUES(7, '((8,1),(3,5))', 'ingles');

INSERT INTO duplicado VALUES(1, 2);
INSERT INTO duplicado VALUES(2, 5);

INSERT INTO utilizador_qualificado VALUES('toni@gmail.com');
INSERT INTO utilizador_qualificado VALUES('luis@gmail.com');

INSERT INTO utilizador_regular VALUES('rita@gmail.com');
INSERT INTO utilizador_regular VALUES('joao@gmail.com');

INSERT INTO proposta_de_correcao VALUES('toni@gmail.com', 1, '2019-01-08 08:05:06', 'alterar o idioma');
INSERT INTO proposta_de_correcao VALUES('toni@gmail.com', 2, '2019-01-08 08:23:06', 'mudar imagem');
INSERT INTO proposta_de_correcao VALUES('luis@gmail.com', 1, '2019-01-08 08:05:06', 'justificar texto');

INSERT INTO correcao VALUES('toni@gmail.com', 2, 3);
INSERT INTO correcao VALUES('luis@gmail.com', 1, 2);

