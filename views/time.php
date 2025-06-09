<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/time.css">
    <title>Escalação</title>
</head>
<body>

    <nav class="navbar">
        <img src="../assets/img/barcelona.png">
        <ul>
            <li><a href="#">Barça Lineup</a></li>
            <li><a href="#">Cards</a></li>
            <li><a href="#">Visualizar Cards</a></li>
            <li><a href="#">Highlights</a></li>
            <li><a href="#">Visualizar Highlights</a></li>
            <li><a href="#">Visualizar Users</a></li>
        </ul>
    </nav>

    <section class="box-time">
        <h1>LINE UP</h1>

        <section class="posicoes">
            <ul>
                <li><button>Goleiro</button></li>
                <li><button>Defensores</button></li>
                <li><button>Meio-Campistas</button></li>
                <li><button>Atacantes</button></li>
                <li><button>Treinador</button></li>
            </ul>
        </section>

        <section class="box-cards">

            <h2>Goleiro</h2>
            <section class="cards bloco-jogador">
                <form class="form-jogador">
                    <input type="file" class="imgInput" accept="image/*" required>
                    <input type="text" class="nomeInput" placeholder="Nome do jogador" required>
                    <input type="submit" value="Adicionar">
                </form>
            </section>

            <h2>Defensores</h2>
            <section class="cards-defensores">

                <section class="cards bloco-jogador">
                    <form class="form-jogador">
                        <input type="file" class="imgInput" accept="image/*" required>
                        <input type="text" class="nomeInput" placeholder="Nome do jogador" required>
                        <input type="submit" value="Adicionar">
                    </form>
                </section>

                <section class="cards bloco-jogador">
                    <form class="form-jogador">
                        <input type="file" class="imgInput" accept="image/*" required>
                        <input type="text" class="nomeInput" placeholder="Nome do jogador" required>
                        <input type="submit" value="Adicionar">
                    </form>
                </section>

                <section class="cards bloco-jogador">
                    <form class="form-jogador">
                        <input type="file" class="imgInput" accept="image/*" required>
                        <input type="text" class="nomeInput" placeholder="Nome do jogador" required>
                        <input type="submit" value="Adicionar">
                    </form>
                </section>

                <section class="cards bloco-jogador">
                    <form class="form-jogador">
                        <input type="file" class="imgInput" accept="image/*" required>
                        <input type="text" class="nomeInput" placeholder="Nome do jogador" required>
                        <input type="submit" value="Adicionar">
                    </form>
                </section>

            </section>

            <h2>Meio-Campistas</h2>

            <section class="cards-meio-campistas">

                <section class="cards bloco-jogador">
                    <form class="form-jogador">
                        <input type="file" class="imgInput" accept="image/*" required>
                        <input type="text" class="nomeInput" placeholder="Nome do jogador" required>
                        <input type="submit" value="Adicionar">
                    </form>
                </section>

                <section class="cards bloco-jogador">
                    <form class="form-jogador">
                        <input type="file" class="imgInput" accept="image/*" required>
                        <input type="text" class="nomeInput" placeholder="Nome do jogador" required>
                        <input type="submit" value="Adicionar">
                    </form>
                </section>

                <section class="cards bloco-jogador">
                    <form class="form-jogador">
                        <input type="file" class="imgInput" accept="image/*" required>
                        <input type="text" class="nomeInput" placeholder="Nome do jogador" required>
                        <input type="submit" value="Adicionar">
                    </form>
                </section>

            </section>
            
            <h2>Atacantes</h2>

            <section class="cards-atacantes">

                <section class="cards bloco-jogador">
                    <form class="form-jogador">
                        <input type="file" class="imgInput" accept="image/*" required>
                        <input type="text" class="nomeInput" placeholder="Nome do jogador" required>
                        <input type="submit" value="Adicionar">
                    </form>
                </section>

                <section class="cards bloco-jogador">
                    <form class="form-jogador">
                        <input type="file" class="imgInput" accept="image/*" required>
                        <input type="text" class="nomeInput" placeholder="Nome do jogador" required>
                        <input type="submit" value="Adicionar">
                    </form>
                </section>

                <section class="cards bloco-jogador">
                    <form class="form-jogador">
                        <input type="file" class="imgInput" accept="image/*" required>
                        <input type="text" class="nomeInput" placeholder="Nome do jogador" required>
                        <input type="submit" value="Adicionar">
                    </form>
                </section>

            </section>

            <h2>Treinador</h2>
            
            <section class="cards bloco-jogador">
                <form class="form-jogador">
                    <input type="file" class="imgInput" accept="image/*" required>
                    <input type="text" class="nomeInput" placeholder="Nome do jogador" required>
                    <input type="submit" value="Adicionar">
                </form>
            </section>



        </section>

        

    </section>



    </section>



    <footer>
        <hr>
        <h3>Barcelona DreamTeam</h3>
    </footer>

    <script>
    document.querySelectorAll('.form-jogador').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const imgInput = form.querySelector('.imgInput');
            const nomeInput = form.querySelector('.nomeInput');
            const file = imgInput.files[0];
            const nome = nomeInput.value;

            if (file && nome) {
                const reader = new FileReader();

                reader.onload = function (event) {
                    const novaDiv = document.createElement('div');
                    novaDiv.classList.add('card-jogador');
                    novaDiv.innerHTML = `
                        <img src="${event.target.result}" style="height: 80%;"><br>
                        <strong style="font-size: 18px; margin-top: 30px; display: inline-block;">${nome}</strong>
                    `;
                    form.parentNode.appendChild(novaDiv);
                    form.remove();
                };

                reader.readAsDataURL(file);
            }
        });
    });
    </script>


</body>
</html>
