## Descrição

- Este plugin permite buscar de palavras em uma lista fornecida pelo usuário através de shortcode. Palavras encontradas são destacadas. Plugin também oferece métodos de ordenação, capitalização e alinhamento das palavras.

## Instalação

- Baixe o plugin no formato "zip".
- Faça o upload do arquivo "zip" no WordPress (Plugins > Adicionar Plugin) e ative o plugin.

## Configuração

- Este plugin não oferece tela de configuração. As opções disponíves são configuradas diretamente no shortcode.

### Parâmetros do shortcode

#### wordlist 
- Lisa de palavras separadas por vírgula.

#### sort
- Tipo de ordenação. 
- Valor padrão: vazio, sem ordenação.
- Opções disponíves:

| Valor                | Ordem                |
|----------------------|----------------------|
| asc                  | Crescente            |
| desc                 | Decrescente          |

#### case
- Tipo de capitalização. 
- Valor padrão vazio, sem capitalização.
- Opções disponíves:

| Valor                | Capitalização        |
|----------------------|----------------------|
| upper                | Maiúsculas           |
| lower                | Minúsculas           |
| title                | Título               |

#### align
- Alinhamento das palavras.
- Valor padrão vazio, alinhamento à esquerda.
- Opções disponíves:

| Valor                | Alinhamento          |
|----------------------|----------------------|
| text-start           | Esquerda             |
| text-center          | Centro               |
| text-end             | Direita              |

#### formplaceholder
- Placeholder do formulário. 
- Valor padrão "Buscar".

#### wrapperclass 
- Classe de estilização do elemento html principal do plugin.

## Uso

- Insira o shortcode com os parâmetros desejados em uma página do wordpress para exibir a lista de palavras com o formulário de busca.

### Exemplo 1 - Lista de palavras sem configuração

```
[wordsearch wordlist="banana, computador, montanha, viagem, elefante, chocolate, livro, oceano, carro, guitarra, flor, relógio, cadeira, cinema, caneta, planeta, cachorro, festa, escola, música, janela, pássaro, estrela, rio, árvore, sol, telefone, café, dança, barco, casa, mapa, avião, bicicleta, ponte, museu, jardim, montanha, pintura, fotografia, chuva, neve, praia, teatro, camisa, sapato, ônibus, rua, jardim, estrada, parque, hospital, tigre, leão, urso, golfinho, canguru, ilha, vulcão, floresta, deserto, cavalo, pato, coelho, foca, barco, nuvem, arco-íris, torre, igreja, relógio, quadro, espelho, sofá, cama, tapete, toalha, sabonete, escova, pente, shampoo, almofada, cortina, guarda-roupa, gaveta, porta, janela, persiana, ventilador, lâmpada, tomada, interruptor, microfone, teclado, monitor, fone, caixa, envelope, papel, caderno, lápis, borracha"]
```

### Exemplo 2 - Lista de palavras ordenada em ordem alfabética e alinhadas ao centro

```
[wordsearch wordlist="banana, computador, montanha, viagem, elefante, chocolate, livro, oceano, carro, guitarra, flor, relógio, cadeira, cinema, caneta, planeta, cachorro, festa, escola, música, janela, pássaro, estrela, rio, árvore, sol, telefone, café, dança, barco, casa, mapa, avião, bicicleta, ponte, museu, jardim, montanha, pintura, fotografia, chuva, neve, praia, teatro, camisa, sapato, ônibus, rua, jardim, estrada, parque, hospital, tigre, leão, urso, golfinho, canguru, ilha, vulcão, floresta, deserto, cavalo, pato, coelho, foca, barco, nuvem, arco-íris, torre, igreja, relógio, quadro, espelho, sofá, cama, tapete, toalha, sabonete, escova, pente, shampoo, almofada, cortina, guarda-roupa, gaveta, porta, janela, persiana, ventilador, lâmpada, tomada, interruptor, microfone, teclado, monitor, fone, caixa, envelope, papel, caderno, lápis, borracha" sort="asc" align="center"]
```