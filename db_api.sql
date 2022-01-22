-- --------------------------------------------------------

--
-- Estrutura da tabela `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(200) NOT NULL,
  `big` tinyint(1) NOT NULL,
  `hot` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `url`, `big`, `hot`, `createdAt`) VALUES
(1, 'Para as Bistecas', 'Em uma tigela tempere as bistecas com sal e pimenta-do-reino, em uma frigideira untada com uma colher de azeite grelhe as bistecas por 3 minutos de cada lado ou até o ponto desejado.', 'pexels-oleg-magni-860977_1.png', 1, 1, '2021-01-01 18:12:52'),
(2, 'Para as panquecas', 'Em uma tigela, misture bem a farinha, o fermento e o sal. Em outra tigela, junte o leite, a manteiga derretida e os ovos batidos', 'pexels-miguel-á-padriñán-114123_1.png', 0, 1, '2021-02-14 18:53:52'),
(3, 'Para o molho', 'Em uma panela adicione o azeite, refogue o alho e a cebola até dourar, junte os tomates previamente picados e sem a pele e a passata e deixe refogar por 10 minutos, adicione 1 xícara de água e 1 ramo de manjericão, tempere com sal e pimenta do reino a gosto e deixe cozinhar por mais 20 minutos.', 'pexels-stas-knop-1298601_2.png', 0, 1, '2021-01-03 11:22:02'),
(4, 'Modo de preparo', 'Tempere as bistecas com o suco de limão, alho, sal e pimenta. Passe as bistecas nos ovos batidos e depois empane na farinha panco. Frite aos poucos, em óleo quente, até dourar.', 'pexels-nubia-navarro-(nubikini)-1178991_1.png', 0, 0, '2021-01-03 13:01:37'),
(5, 'Cassoulet de Feijão-Branco com Pé', 'Em uma panela de pressão junte o alho, o azeite e refogue por 2 minutos', 'pexels-scott-webb-63952_1.png', 1, 1, '2021-08-02 20:13:52'),
(6, 'Bife de Ancho com Salada de Couve-Flor e Avelãs', 'Tempere o Ancho Suíno fatiado resfriado com sal, pimenta do reino e a páprica defumada. Aqueça uma frigideira em fogo médio, junte o azeite e frite o Ancho por cerca de 7 minutos, virando as peças na metade do tempo ou até estarem douradas.', 'pexels-olenka-sergienko-1904262_1.png', 0, 0, '2021-03-07 06:05:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`) VALUES
(1, 'Placehold 00', 'email@email.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `heros`
--

CREATE TABLE `heros` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `heros`
--

INSERT INTO `heros` (`id`, `content`) VALUES
(1, 'Em uma tigela tempere as bistecas com sal e pimenta-do-reino, em uma frigideira untada com uma colher de azeite grelhe as bistecas por 3 minutos de cada lado ou até o ponto desejado.'),
(2, 'Em uma panela adicione o azeite, refogue o alho e a cebola até dourar, junte os tomates previamente picados e sem a pele e a passata e deixe refogar por 10 minutos, adicione 1 xícara de água e 1 ramo de manjericão, tempere com sal e pimenta do reino a gosto e deixe cozinhar por mais 20 minutos.'),
(3, 'Sirva as bistecas com o molho e folhas de manjericão frescas por cima.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `heros`
--
ALTER TABLE `heros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `heros`
--
ALTER TABLE `heros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;