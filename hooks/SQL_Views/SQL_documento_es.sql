CREATE OR REPLACE VIEW SQL_documento_es AS 

SELECT
    CONCAT_WS('',`id`,'item') as codigo,
    `id` as identificador,
    'item' as tabla,
    `titulo` as titulo,
   CONVERT( 
       CONCAT_WS(
        ';;',
        `identificacao`,
        `colecao`,
        `grupo`,
        `grupo_codigo`,
        `serie`,
        `serie_codigo`,
        `subserie`,
        `titulo`,
        `descricao`,
        `tipologia`,
        `autoria`,
        `idioma`,
        `local_producao`,
        `local_publicacao_veiculo`,
        `local_publicacao`,
        `tipo_publicacao`,
        CONVERT(`genero` USING utf8),
        `forma`,
        CONVERT(`formato` USING utf8),
        `escritura`,
        CONVERT(`suporte` USING utf8),
        `dimensao`,
        `estado_conservacao`,
        `observacoes`,
        CONVERT(`documentos_relacionados` USING utf8),
        `numero_caixa`,
        `nome_caixa`,
        `nome_pasta`
        )
    USING utf8 ) as "contenido"
FROM
    `SQL_completeItemsView`