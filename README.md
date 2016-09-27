# Converter de datas formato brasileiro
Funções que facilitam a conversão de datas no formato brasileiro para outros formatos e vice-versa

Recebe data nos formatos aaaa-mm-dd ou dd/mm/aaaa e devolve em qualquer formato desejado

## Formatos de saída padrões

### Recebe em qualquer formato e sai em formato brasileiro
databr(31/12/2010) → 31/12/2010
databr(2010-12-31) → 31/12/2010
databr(1293753600) → 31/12/2010

### Recebe em qualquer formato e sai em formato brasileiro ou invertido
parseDate(31/12/2010) → 2010-12-31
parseDate(2010-12-31) → 31/12/2010
parseDate(1293753600) → 31/12/2010

### Recebe em qualquer formato e sai em formato sql
datasql(31/12/2010) → 2010-12-31
datasql(2010-12-31) → 2010-12-31
datasql(1293753600) → 2010-12-31

### Recebe em qualquer formato e sai em formato timestamp
datatime(31/12/2010) → 1293753600
datatime(2010-12-31) → 1293753600
datatime(1293753600) → 1293753600

## Formatos de saída personalizados
Para criar um formato de saída personalizado, basta informar o segundo parametro com uma string template contendo as siglas que serão substituídas pelas partes da data ou horário. Veja o exemplo abaixo

<code>
$formato1 = 'Hoje é dia dd do mês mm do ano aaaa aos ss segundos, ii minutos e hh horas';
echo parseDate('31/12/2015 23:55:59', $formato1);
// Hoje é dia 31 do mês 12 do ano 2015 aos 59 segundos, 55 minutos e 23 horas

$formato2 = 'Data: [data_br] - Horário: [horario]';
echo parseDate('2015-12-31 23:55:59', $formato2);
// Data: 31/12/2015 - Horário: 23:55:59
</code>

### Siglas para utilizar no template de formato
[data] -> data padrão no formato brasileiro dd/mm/aaaa
[datasql] -> data no formato mysql aaaa-mm-dd
dd -> dia com dois dígitos
mm -> mes com dois dígitos
aaaa -> ano com quatro dígitos
aa -> ano com dois últimos dígitos
hh -> hora
ii ou :mm -> minutos ou dois pontos + minutos
ss -> segundos
