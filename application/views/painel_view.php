<!doctype html>
<html class="no-js" lang="pt-br">
	  <head>
		    <meta charset="utf-8" />
		    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		    <title><?php if (isset($titulo)): ?>{titulo} | <?php endif; ?>{titulo_padrao}</title>
		    
		    {headerinc}
	  </head>
	  <body>
			{conteudo}
	  		<script src="js/foundation.min.js"></script>
	  		{rodape}
	  </body>
</html>