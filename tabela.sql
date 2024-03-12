	-- Crie um banco de dados (se ainda não existir)
	CREATE DATABASE IF NOT EXISTS VavaStore;

	-- Use o banco de dados recém-criado
	USE VavaStore;

	-- Crie a tabela "usuarios"
	CREATE TABLE usuarios (
		id INT AUTO_INCREMENT PRIMARY KEY,
		nome VARCHAR(40),
		email VARCHAR(255),
		senha VARCHAR(255),
		perfil INT DEFAULT 0
	);

	-- Insira usuários de exemplo
	INSERT INTO usuarios (nome, email, senha, perfil) VALUES
		('Adm', 'adm@adm.com', 'adm123', 1),
		('leo', 'leo@teste.com', '123', 0),
		('pai', 'pai@teste.com', '123', 0);

	-- Crie a tabela "produtos"
	CREATE TABLE produtos (
		id INT AUTO_INCREMENT PRIMARY KEY,
		nome VARCHAR(255) NOT NULL,
		descricao TEXT,
		categoria VARCHAR(100),
		preco DECIMAL(10, 2),
		disponibilidade VARCHAR(50)
	);
    
CREATE TABLE vendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comprador_id INT NOT NULL,
    comprador_nome VARCHAR(255) NOT NULL,
    comprador_telefone VARCHAR(20) NOT NULL,
    comprador_endereco TEXT NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    horario_compra TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    situacao ENUM('pendente', 'processando', 'concluido') DEFAULT 'pendente',
    FOREIGN KEY (comprador_id) REFERENCES usuarios(id)
);

CREATE TABLE itens_venda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    venda_id INT,
    produto_nome VARCHAR(255) NOT NULL,
    produto_categoria VARCHAR(255) NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10, 2) NOT NULL,	
    FOREIGN KEY (venda_id) REFERENCES vendas(id)	
);

	-- Insira produtos de exemplo
	INSERT INTO produtos (nome, descricao, categoria, preco, disponibilidade) VALUES
		('Ruina', 'Uma skin Ghost misteriosa e assustadora com um visual sombrio.', 'ghost', 49.99, 'Em Estoque'),
		('Soberania', 'Outra descrição de produto de exemplo.', 'ghost', 39.99, 'Em Estoque'),
		('Magipunk', 'Mais uma descrição de produto de exemplo.', 'ghost', 29.99, 'Em Estoque'),
		('Saqueadora', 'Descrição de produto para a categoria Vandal.', 'vandal', 19.99, 'Em Estoque'),
		('Netuno', 'Descrição de produto para a categoria Vandal.', 'vandal', 59.99, 'Em Estoque'),
		('Gaia', 'Descrição de produto para a categoria Faca.', 'faca', 69.99, 'Em Estoque'),
		('Reconhecimento', 'Descrição de produto para a categoria Faca.', 'faca', 49.99, 'Em Estoque'),
		('VCT', 'Descrição de produto para a categoria Faca.', 'faca', 79.99, 'Em Estoque'),
		('Ancifogo', 'Descrição de produto para a categoria Operator.', 'operator', 99.99, 'Em Estoque'),
		('Araxys', 'Descrição de produto para a categoria Operator.', 'operator', 89.99, 'Em Estoque'),
		('Lugubre', 'Descrição de produto para a categoria Operator.', 'operator', 79.99, 'Em Estoque'),
		('Champions', 'Descrição de produto para a categoria Phantom.', 'phantom', 59.99, 'Em Estoque'),
		('Protocolo', 'Descrição de produto para a categoria Phantom.', 'phantom', 69.99, 'Em Estoque'),
		('Reconhecimento', 'Descrição de produto para a categoria Phantom.', 'phantom', 49.99, 'Em Estoque'),
		('Ion', 'Descrição de produto para a categoria Sheriff.', 'sheriff', 79.99, 'Em Estoque'),
		('Neo', 'Descrição de produto para a categoria Sheriff.', 'sheriff', 89.99, 'Em Estoque'),
		('Singularidade', 'Descrição de produto para a categoria Sheriff.', 'sheriff', 99.99, 'Em Estoque');

	-- Consulta para ver os usuários
	SELECT * FROM usuarios;

	-- Consulta para ver os produtos
	SELECT * FROM produtos;
    
SELECT * FROM vendas;
SELECT * FROM itens_venda;