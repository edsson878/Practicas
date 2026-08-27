<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="/assets/js/vue/vue.min.js"></script>
</head>

<body>
    <div id="app">
        <input v-model="message">
        {{ message }}
    </div>

    <script>
        var app = new Vue({
            el: '#app',
            data() {
                return {
                    message: 'Hello, Vue!'
                };
            },
            created() {
                const self = this; // Preserva la referencia a la instancia de Vue
                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'prueba.php', true);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                        } else {
                            self.message = 'Error';
                        }
                    }
                };
                xhr.send();
            }
        });
    </script>
</body>
</html>