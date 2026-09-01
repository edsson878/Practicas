<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/assets/js/vue/vue.min.js"></script>
    <title>🐱‍🚀</title>
</head>
<body>
    <div id="app">
        <input v-model="message">
        <div>{{ message }}</div>
        <button @click="agregar">Agregar</button>
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
                    alert(this.keyword);

                    const xhr = new XMLHttpRequest();
                    xhr.open('GET', '/prueba.php?buscar='+encodeURIComponent(this.keyword), true);  
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                            let respuesta = JSON.parse(xhr.responseText);
                            JSON.parse(xhr.responseText);
                            this.resultados.push(...respuesta);
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