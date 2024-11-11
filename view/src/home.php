<?php
include("../src/header.php");
?>


<style>
    .promocao {
        height: 800px;
        display: flex;
        align-items: center;
    }

    .slide {
        width: max-content;
        height: 100%;
        position: absolute;
        z-index: 1;
        transition: left .4s cubic-bezier(.47, .13, .15, .89);
        padding-left: 100px;
    }

    .conteudo-slide {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        width: max-content;
        padding: 10px 14px;
    }

    .carousel {
        position: relative;
        width: 1440px;
        height: 466px;
        margin: 0 auto;
    }

    .carousel-content {
        position: relative;
        overflow: hidden;
        transition: width .4s;
        height: 500px;
    }

    .nav {
        position: absolute;
        z-index: 50;
        top: 50%;
        transform: translateY(-50%);
    }

    .nav button {
        background-color: transparent;
        border: none;
        font-size: 30px;
        padding: 15px
    }

    .nav.nav-left {
        left: -4%;
    }

    .nav.nav-right {
        right: 10%;
    }
    .nav.nav-right button {
        color: aliceblue;
    }
    .nav.nav-left button {
        color: aliceblue;
    }
</style>

<section class="promocao">
    <div class="container">

        <div class="carousel">

            <div class="nav nav-left">
                <button>
                    <</button>
            </div>

            <div class="carousel-content">
                <div class="slide">
                    <div class="conteudo-slide">
                        <div class="pizza-body">
                            <img src="../imagens/imagemTemplate.png" alt="pizza">
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="conteudo-slide">
                        <div class="pizza-body">
                            <img src="../imagens/imagemTemplate.png" alt="pizza">
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="conteudo-slide">
                        <div class="pizza-body">
                            <img src="../imagens/imagemTemplate.png" alt="pizza">
                        </div>
                    </div>
                </div>

            </div>

            <div class="nav nav-right">
                <button>></button>
            </div>
        </div>
    </div>
</section>


<script>

    document.addEventListener('DOMContentLoaded', function () {

        //-----carousel---
        var carousel = document.querySelector('.carousel');
        var carouselContent = document.querySelector('.carousel-content');
        var slides = document.querySelectorAll('.slide');
        var arrayOfSlides = Array.prototype.slice.call(slides); // Transformando NodeList em array
        var carouselDisplaying;
        var screenSize;
        setScreenSize(); // Inicializa o tamanho da tela
        var lengthOfSlide;

        // Função para adicionar um clone do último slide no início
        function addClone() {
            var lastSlide = carouselContent.lastElementChild.cloneNode(true);
            lastSlide.style.left = (-lengthOfSlide) + 'px';
            carouselContent.insertBefore(lastSlide, carouselContent.firstChild);
        }

        // Função para remover o primeiro slide (clone)
        function removeClone() {
            var firstSlide = carouselContent.firstChild;
            firstSlide.parentNode.removeChild(firstSlide);
        }

        // Movimenta os slides para a direita
        function moveSlideRight() {
            var slides = document.querySelectorAll('.slide');
            var slideArray = Array.prototype.slice.call(slides);
            var width = 0;

            slideArray.forEach(function (elemento) {
                elemento.style.left = width + 'px';
                width += lengthOfSlide;
            });
            addClone();
        }
        moveSlideRight(); // Move os slides ao carregar a página

        // Movimenta os slides para a esquerda
        function moveSlideLeft() {
            var slides = document.querySelectorAll('.slide');
            var slideArray = Array.prototype.slice.call(slides);
            slideArray = slideArray.reverse();
            var maxWidth = (slideArray.length - 1) * lengthOfSlide;

            slideArray.forEach(function (elemento) {
                maxWidth -= lengthOfSlide;
                elemento.style.left = maxWidth + 'px';
            });
        }

        // Atualiza o layout conforme o tamanho da tela
        window.addEventListener('resize', setScreenSize);

        // Define quantos slides serão exibidos de acordo com o tamanho da tela
        function setScreenSize() {
            carouselDisplaying = 1;

            getScreenSize();
        }

        // Ajusta o tamanho e posição de cada slide
        function getScreenSize() {
            var slides = document.querySelectorAll('.slide');
            var slideArray = Array.prototype.slice.call(slides);
            lengthOfSlide = (carousel.offsetWidth / carouselDisplaying);
            var initialWidth = -lengthOfSlide;

            slideArray.forEach(function (elemento) {
                elemento.style.width = lengthOfSlide + 'px';
                elemento.style.left = initialWidth + 'px';
                initialWidth += lengthOfSlide;
            });
        }

        var rightNav = document.querySelector('.nav-right');
        rightNav.addEventListener('click', moveLeft);

        var moving = true;

        // Move os slides para a direita
        function moveRight() {
            if (moving) {
                moving = false;
                var lastSlide = carouselContent.lastElementChild;
                lastSlide.parentNode.removeChild(lastSlide);
                carouselContent.insertBefore(lastSlide, carouselContent.firstChild);
                removeClone();
                var firstSlide = carouselContent.firstElementChild;
                firstSlide.addEventListener('transitionend', activateAgain);
                moveSlideRight();
            }
        }

        // Reativa a movimentação após a transição
        function activateAgain() {
            var firstSlide = carouselContent.firstElementChild;
            moving = true;
            firstSlide.removeEventListener('transitionend', activateAgain);
        }

        var leftNav = document.querySelector('.nav-left');
        leftNav.addEventListener('click', moveRight);

        // Move os slides para a esquerda
        function moveLeft() {
            if (moving) {
                moving = false;
                removeClone();
                var firstSlide = carouselContent.firstElementChild;
                firstSlide.addEventListener('transitionend', replaceToEnd);
                moveSlideLeft();
            }
        }

        // Move o primeiro slide para o fim e adiciona o clone
        function replaceToEnd() {
            var firstSlide = carouselContent.firstElementChild;
            firstSlide.parentNode.removeChild(firstSlide);
            carouselContent.appendChild(firstSlide);
            firstSlide.style.left = ((arrayOfSlides.length - 1) * lengthOfSlide) + 'px';
            addClone();
            moving = true;
            firstSlide.removeEventListener('transitionend', replaceToEnd);
        }

        // Detecta o movimento do mouse
        carouselContent.addEventListener('mousedown', seeMovement);

        var initialX;
        var initialPos;

        function seeMovement(evento) {
            initialX = evento.clientX;
            getInitialPos();
            carouselContent.addEventListener('mousemove', slightMove);
            document.addEventListener('mouseup', moveBasedOnMouse);
        }

        function slightMove(evento) {
            if (moving) {
                var movingX = evento.clientX;
                var difference = initialX - movingX;
                if (Math.abs(difference) < (lengthOfSlide / 4)) {
                    slightMoveSlides(difference);
                }
            }
        }

        // Captura a posição inicial dos slides
        function getInitialPos() {
            var slides = document.querySelectorAll('.slide');
            var slidesArray = Array.prototype.slice.call(slides);
            initialPos = [];

            slidesArray.forEach(function (elemento) {
                var left = Math.floor(parseInt(elemento.style.left.slice(0, -2), 10));
                initialPos.push(left);
            });
        }

        // Move os slides conforme a posição do mouse
        function slightMoveSlides(newX) {
            var slides = document.querySelectorAll('.slide');
            var slidesArray = Array.prototype.slice.call(slides);

            slidesArray.forEach(function (elemento, i) {
                var oldLeft = initialPos[i];
                elemento.style.left = (oldLeft + newX) + 'px';
            });
        }

        // Move os slides com base no movimento do mouse
        function moveBasedOnMouse(evento) {
            var finalX = evento.clientX;
            if (initialX - finalX > 0) {
                moveRight();
            } else if (initialX - finalX < 0) {
                moveLeft();
            }

            document.removeEventListener('mouseup', moveBasedOnMouse);
            carouselContent.removeEventListener('mousemove', slightMove);
        }

    });
</script>


<?php
include("../src/footer.php");
