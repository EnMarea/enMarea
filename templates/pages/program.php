<?php 

$social = new SocialLinks\Page([
    'url' => $this->url('program'),
    'title' => 'Programa 2016',
    'text' => 'En Marea, a alternativa de cambio en Galicia. Coñece a Luís Villares, o futuro presidente da Xunta',
    'image' => $this->asset('img/img-rrss.png'),
    'twitterUser' => '@en_marea',
]);
?>

<?= $this->layout('layouts/default', ['social' => $social]) ?>

<?php $this->start('extra-head') ?>
<link rel="stylesheet" type="text/css" href="<?= $this->asset('css/pages/program.css') ?>">
<?php $this->stop(); ?>

<div class="page-header-container">
	<header>
		<h1>Programa</h1>
	</header>

	<div class="page-intro">
		<p>En Marea nacemos para mudalo todo. Somos o espazo político das de abaixo, en que xentes diversas, plurais, como o propio país, poñemos as nosas mans para construírmos un futuro colectivo máis xusto. Somos un espazo aberto, de cooperación, que procura unha política a prol dos máis e non secuestrada por unha minoría. Queremos unha Galicia onde a xente decida sobre a súa vida. Unha Galicia en que a xustiza social sexa horizonte común e ninguén fique atrás. Unha Galicia en que a economía sirva para mellorar a vida das persoas, o autogoberno axude ao benestar común e as institucións sexan de todas. Unha Galicia xusta.</p>
	</div>
</div>

<div class="page-content">
	<ul class="page-blocks">
		<?php foreach ($blocks as $block): ?>
		<li>
			<a href="<?= $this->url('program-block', ['block' => $block->slug]) ?>">
				<?= $this->svg($block->icon)->withA11y($block->title) ?>
				<?= $block->title ?>
			</a>
		</li>
		<?php endforeach ?>
	</ul>

	<div class="page-text">
		<section>
			<h2>Construír un país mellor en común.</h2>

			<p>Queremos un país de todas. Onde sexa doado vivir. Onde non sobre ninguén. Un país construído coas propias mans. En común. Un país xusto, en que a liberdade e a igualdade sexan as pernas sobre as que camiñe a súa xente. Como en Nunca Máis, como nas prazas do 15M, unidas, unidos, para reconstruírmos a dignidade colectiva e procurarmos un futuro que non poder quedar nas mans dos que non cren nel. Un país que nos poidamos mirar. Onde as institucións recuperen o seu sentido e estean ao servizo da maioría. Un país onde o decidamos todo.</p>
		</section>

		<section>
			<h2>Os desafíos para o futuro de Galicia.</h2>

			<p>A brutal crise económica que asoballa Europa agravouse en Galicia, país do sur deste territorio, debido ao entusiasmo de Feijóo na aplicación de agresivas políticas neoliberais. O Partido Popular, ademais, nunca creu en que Galicia se deba gobernar a si mesma. Coa dereita ao mando, Galicia sucumbiu ás receitas fracasadas do neoliberalismo. Pero En Marea olla ao futuro. A liberdade e a igualdade, é dicir a xustiza social, constitúe a guía coa que enfrontaremos os desafíos económicos, demográficos, ambientais, culturais e dos coidados en Galicia.</p>
		</section>

		<section>
			<h2>O goberno galego da cidadanía.</h2>

			<p> En Marea devolverá o goberno á xente e acabará co secuestro da democracia por unha minoría. Con En Marea será a cidadanía quen decida sobre a súa vida e o seu futuro. Iso é, para nós, a soberanía. Decidilo todo. Porque xa é tempo de que o goberno galego deixe de ser un atranco para o propio país e as súas potencialidades. Galicia non se laia, Galicia está na vangarda política e social, e o 25 de setembro amosará, de novo, a súa vontade colectiva de pasar páxina e apropiarse do seu porvir.</p>
		</section>
	</div>
</div>