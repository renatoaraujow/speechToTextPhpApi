# API Speech To Text PHP API

API desenvolvida para comunicar com o Google Speech.

## Detalhes

A API contém as seguintes características:

 - Projeto criado em PHP utilizando **Composer**
 - Os áudios enviados devem estar no formato **.flac**
 - Os áudios enviados devem estar na frequência **44100** KHz
 - Os áudios devem ser enviados em **base64**
 - Para ver um exemplo vá até o projeto **speechToTextJsApp/**

## Executando o projeto
	
 - Para gerar uma chave de autenticação na Google Cloud, siga os passos descritos [**neste tutorial**](https://cloud.google.com/video-intelligence/docs/common/auth)
 - Coloque o arquivo JSON gerado na pasta **./keys/**
 - No arquivo **speechToTextPhpApi/index.php** coloque o nome do seu arquivo na váriavel ```$fileNameGoogleKey```
 - Baixe e instale o [**Composer**](https://getcomposer.org/)
 - Após a instalação do composer, abra um terminal e digite:
 - ```git clone https://github.com/renatopa/speechToTextPhpApi.git```
 - ```git clone https://github.com/renatopa/speechToTextJsApp.git```
 - ```cd speechToTextPhpApi```
 - ```composer install```
 - Depois disso abra o navegador e navegue até a pasta do projeto **speechToTextJsApp/**