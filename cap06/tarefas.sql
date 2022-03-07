CREATE TABLE tarefas (
id INTEGER AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(20) NOT NULL,
descricao TEXT,
prazo DATE,
prioridade INTEGER(1),
concluida BOOLEAN
);

INSERT INTO tarefas
(nome, descricao, prioridade)
VALUES
('Estudar PHP', 'Continuar meus estudos de PHP e MySQL', 1)