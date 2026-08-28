<!DOCTYPE html>
<html lang="es">
<head>
    <!--Para caracteres especiales -->
    <meta charset="UTF-8">
    <!--Para el escalado de la pagina se adapte al dispositivo en la que se 
        abre sea celular, tablet o  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Siempre se carga primero vue  -->
    <script src="/assets/js/vue/vue.min.js"></script>
</head>
<body>
    <div id="app">
        <input v-model="message">
        <div>{{ message }}</div>
        <input 
        type = "search"
        placeholder = "Escribe algo"
        v-model = "keyword"
        >
        <button @click="agregar">Agregar</button>
        <button @click="buscarTexto">Buscar</button>
        <hr>
        <h2>Los resusltados de la busqueda son:</h2>
        <ul> 
            <li
            v-for="elemento in resultados"
            :key = "elemento.id"
            >{{elemento.nombre}}</li>
        </ul>
    </div>
    <script src="/assets/js/vue/vue.min.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data() {return   {
                message: 'Hello Vue!',
                keyword: '',
                resultados: [
                    {id:1, nombre:"Juan"},
                    {id:2, nombre:"Carlos"}],
            }},
            created(){
                const xhr = new XMLHttpRequest();
                xhr.open('GET', '/prueba.php', true);
                
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            this.message = xhr.responseText;
                        } else {
                            this.message = 'Error: ';
                        }
                    }
                }.bind(this);
                xhr.send();
            },
            methods:{
                buscarTexto(){
                    //aqui van las funciones que se ejecutan al hacer click en el boton
                    //para accedera todos los elementos de vue se utiliza this
                    alert(this.keyword);

                    const xhr = new XMLHttpRequest();
                    //Concatenar = Unir 2 o mas cadenas de texto
                    xhr.open('GET', '/prueba.php?buscar='+encodeURIComponent(this.keyword), true);
                    
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                               // this.message = xhr.responseText;
                            } else {
                                this.message = 'Error: ';
                            }
                        }
                    }.bind(this);
                    xhr.send();
                },
                agregar(){
                    this.resultados.push({id: this.resultados.length + 1, nombre: this.message});
                    this.message = '';
                }

                
            } 
        });
    </script>
</body>
</html>