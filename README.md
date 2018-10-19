# Notes

Aplicacion para registrar y mostrar notas por pantalla.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Se necesitan los siguientes requisitos : PHP > 7.* , Mysql , Composer 


### Installing

Clonar repositorio : cd /project_folder git clone https://github.com/JorgeGonzalezPizarro/notes.git

Instalar o actualizar dependencias : composer install / composer update 

Crear la base de datos Note : cd /project_folder/infrastructure/Persistance  Db file -> ejecutar script

Note(id , note_title , note_text )

Acceso : http://SERVERNAME:default_port/notes



## Descripcion del proyecto PHP 

El projecto está dividido en 3directorios  
  - Domain/Notes : 
      -Api : Receptor de la peticion GET/POST 
      -Application : Casos de uso CreateNote , GetNotes
      -Model : Modelo de dominio y VO de Note
  - Public/ :
      - app.php : Interfaz web / front HTML , utiliza la tecnologia Ajax para hacer peticiones GET/POST.
  - ./bootstrap.app : Middleware de enrutado y generación de dependencias para su inyección
  
  
El fichero /bootstrap.app se encarga de enrutar peticiones GET/POST e inyectar al Api-controller(ApiNote) .
El flujo de la peticion es la siguiente : 

  1-Dado una peticion GET/POST para listar o crear notas , se inyecta en el api-controlador directamente al metodo que le 
  pertenece.
  2- Caso GET: 
  
      - Consulta todas los registros almacenados en la base de datos , devuelve la respuesta en caso correcto.
  
  -Caso POST:
  
      - Utiliza el patrón Command para ejecutar un caso de uso createNote (Command -> Handler -> UseCase) , 
      - Utiliza Value Objects para modelar los atributos de la Entidad Note : NoteTitle , NoteText.
      - Genera el objecto en base a éstos atributos y un UUID .
      - Persiste el objeto en la base de datos.
 
 Ambas peticiones se realizan por Ajax desde el archivo app.php
 
#Dockerfile

En caso de querer utilizar un contenedor Docker , se proporciona el fichero Dockerfile . 
Para crear la imagen : docker build . -t "notes" 
Ejecutar contenedor : docker run -d -t 8080/80 "notes:lastest" 
En caso de querer acceder al contenedor : docker exec -it $(contenedor) bash .


 
