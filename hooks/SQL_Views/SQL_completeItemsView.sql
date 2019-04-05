CREATE OR REPLACE VIEW SQL_completeItemsView AS 

SELECT
    `item`.`id` AS 'id',
    `item`.`identificacao` AS 'identificacao',
    `item`.`numero_serie` AS 'numero_serie',
    IF(
        CHAR_LENGTH(`colecao1`.`colecao`),
        CONCAT_WS('', `colecao1`.`colecao`),
        ''
    ) AS 'colecao',
    IF(
        CHAR_LENGTH(`colecao1`.`codigo_colecao`),
        CONCAT_WS('', `colecao1`.`codigo_colecao`),
        ''
    ) AS 'colecao_codigo',
    IF(
        CHAR_LENGTH(`grupo1`.`grupo`),
        CONCAT_WS('', `grupo1`.`grupo`),
        ''
    ) AS 'grupo',
    IF(
        CHAR_LENGTH(`grupo1`.`codigo_grupo`),
        CONCAT_WS('', `grupo1`.`codigo_grupo`),
        ''
    ) AS 'grupo_codigo',
    IF(
        CHAR_LENGTH(`serie1`.`serie`),
        CONCAT_WS('', `serie1`.`serie`),
        ''
    ) AS 'serie',
    IF(
        CHAR_LENGTH(`serie1`.`codigo`),
        CONCAT_WS('', `serie1`.`codigo`),
        ''
    ) AS 'serie_codigo',
    IF(
        CHAR_LENGTH(`subserie1`.`subserie`),
        CONCAT_WS('', `subserie1`.`subserie`),
        ''
    ) AS 'subserie',
    `item`.`titulo` AS 'titulo',
    `item`.`titulo_atribuido` AS 'titulo_atribuido',
    `item`.`descricao` AS 'descricao',
    IF(
        CHAR_LENGTH(`tipologia1`.`tipologia`),
        CONCAT_WS('', `tipologia1`.`tipologia`),
        ''
    ) AS 'tipologia',
    IF(
        `item`.`date`,
        DATE_FORMAT(`item`.`date`, '%d/%m/%Y'),
        ''
    ) AS 'date',
    `item`.`data_livre` AS 'data_livre',
    `item`.`data_atribuida` AS 'data_atribuida',
    `item`.`autoria` AS 'autoria',
    `item`.`quantidade` AS 'quantidade',
    `item`.`idioma` AS 'idioma',
    `item`.`local_producao` AS 'local_producao',
    IF(
        CHAR_LENGTH(
            `local_comunicacao1`.`local_comunicacao`
        ),
        CONCAT_WS(
            '',
            `local_comunicacao1`.`local_comunicacao`
        ),
        ''
    ) AS 'local_publicacao_veiculo',
    `item`.`local_publicacao` AS 'local_publicacao',
    IF(
        CHAR_LENGTH(
            `tipo_publicacao1`.`tipo_publicacao`
        ),
        CONCAT_WS(
            '',
            `tipo_publicacao1`.`tipo_publicacao`
        ),
        ''
    ) AS 'tipo_publicacao',
    `item`.`genero` AS 'genero',
    `item`.`forma` AS 'forma',
    `item`.`formato` AS 'formato',
    `item`.`escritura` AS 'escritura',
    `item`.`suporte` AS 'suporte',
    `item`.`dimensao` AS 'dimensao',
    `item`.`estado_conservacao` AS 'estado_conservacao',
    `item`.`observacoes` AS 'observacoes',
    `item`.`documentos_relacionados` AS 'documentos_relacionados',
    IF(
        CHAR_LENGTH(`numero_caixa1`.`numero_caixa`),
        CONCAT_WS('', `numero_caixa1`.`numero_caixa`),
        ''
    ) AS 'numero_caixa',
    IF(
        CHAR_LENGTH(`nome_caixa1`.`nome_caixa`),
        CONCAT_WS('', `nome_caixa1`.`nome_caixa`),
        ''
    ) AS 'nome_caixa',
    IF(
        CHAR_LENGTH(`numero_pasta1`.`numero_pasta`),
        CONCAT_WS('', `numero_pasta1`.`numero_pasta`),
        ''
    ) AS 'numero_pasta',
    IF(
        CHAR_LENGTH(`nome_pasta1`.`nome_pasta`),
        CONCAT_WS('', `nome_pasta1`.`nome_pasta`),
        ''
    ) AS 'nome_pasta',
    `item`.`upload` AS 'upload',
    `item`.`usuario_cadastro` AS 'usuario_cadastro',
    `item`.`usuario_alteracao` AS 'usuario_alteracao',
    `item`.`publicar` AS 'publicar',
    `item`.`uploads` AS 'uploads'
FROM
    `item`
LEFT JOIN `colecao` AS colecao1
ON
    `colecao1`.`id` = `item`.`colecao`
LEFT JOIN `grupo` AS grupo1
ON
    `grupo1`.`id` = `item`.`grupo`
LEFT JOIN `serie` AS serie1
ON
    `serie1`.`id` = `item`.`serie`
LEFT JOIN `subserie` AS subserie1
ON
    `subserie1`.`id` = `item`.`subserie`
LEFT JOIN `tipologia` AS tipologia1
ON
    `tipologia1`.`id` = `item`.`tipologia`
LEFT JOIN `local_comunicacao` AS local_comunicacao1
ON
    `local_comunicacao1`.`id` = `item`.`local_publicacao_veiculo`
LEFT JOIN `tipo_publicacao` AS tipo_publicacao1
ON
    `tipo_publicacao1`.`id` = `item`.`tipo_publicacao`
LEFT JOIN `numero_caixa` AS numero_caixa1
ON
    `numero_caixa1`.`id` = `item`.`numero_caixa`
LEFT JOIN `nome_caixa` AS nome_caixa1
ON
    `nome_caixa1`.`id` = `item`.`nome_caixa`
LEFT JOIN `numero_pasta` AS numero_pasta1
ON
    `numero_pasta1`.`id` = `item`.`numero_pasta`
LEFT JOIN `nome_pasta` AS nome_pasta1
ON
    `nome_pasta1`.`id` = `item`.`nome_pasta`