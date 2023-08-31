@extends('layouts.main')



@section('container')
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <h1>Halaman About</h1>
    <h3> {{ $name }} </h3>
    <p> {{ $email }}</p>
    <img src="img/{{ $image }}" alt="{{ $name }}" width="200" class="img-thumbhnail rounded-circle">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');


        :root {
            --yellow: #FFBD13;
            --blue: #4383FF;
            --blue-d-1: #3278FF;
            --light: #F5F5F5;
            --grey: #AAA;
            --white: #FFF;
            --shadow: 8px 8px 30px rgba(0, 0, 0, .05);
        }


        .wrapper {
            background: var(--white);
            padding: 2rem;
            max-width: 576px;
            width: 100%;
            border-radius: .75rem;
            box-shadow: var(--shadow);
            text-align: center;
        }

        .wrapper h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .rating {
            display: flex;
            justify-content: center;
            align-items: center;
            grid-gap: .5rem;
            font-size: 2rem;
            color: var(--yellow);
            margin-bottom: 2rem;
        }

        .rating .star {
            cursor: pointer;
        }

        .rating .star.active {
            opacity: 0;
            animation: animate .5s calc(var(--i) * .1s) ease-in-out forwards;
        }

        @keyframes animate {
            0% {
                opacity: 0;
                transform: scale(1);
            }

            50% {
                opacity: 1;
                transform: scale(1.2);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }


        .rating .star:hover {
            transform: scale(1.1);
        }

        textarea {
            width: 100%;
            background: var(--light);
            padding: 1rem;
            border-radius: .5rem;
            border: none;
            outline: none;
            resize: none;
            margin-bottom: .5rem;
        }

        .btn-group {
            display: flex;
            grid-gap: .5rem;
            align-items: center;
        }

        .btn-group .btn {
            padding: .75rem 1rem;
            border-radius: .5rem;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: .875rem;
            font-weight: 500;
        }

        .btn-group .btn.submit {
            background: var(--blue);
            color: var(--white);
        }

        .btn-group .btn.submit:hover {
            background: var(--blue-d-1);
        }

        .btn-group .btn.cancel {
            background: var(--white);
            color: var(--blue);
        }

        .btn-group .btn.cancel:hover {
            background: var(--light);
        }
    </style>

    <div class="container">
        <div class="wrapper">
            <h3>Lorem ipsum dolor sit amet.</h3>
            <form action="#">
                <div class="rating">
                    {{-- <input type="number" name="rating" hidden>
                    <i class='bx bx-star star' style="--i: 0;"></i>
                    <i class='bx bx-star star' style="--i: 1;"></i>
                    <i class='bx bx-star star' style="--i: 2;"></i>
                    <i class='bx bx-star star' style="--i: 3;"></i>
                    <i class='bx bx-star star' style="--i: 4;"></i> --}}

                    <input type="radio" id="star1" name="rating" value="1" hidden />
                    <label for="star1"><i class='bx bx-star star' style="--i: 0;"></i></label>
                    <input type="radio" id="star2" name="rating" value="2" hidden />
                    <label for="star2"><i class='bx bx-star star' style="--i: 1;"></i></label>
                    <input type="radio" id="star3" name="rating" value="3" hidden />
                    <label for="star3"><i class='bx bx-star star' style="--i: 2;"></i></label>
                    <input type="radio" id="star4" name="rating" value="4" hidden />
                    <label for="star4"><i class='bx bx-star star' style="--i: 3;"></i></label>
                    <input type="radio" id="star5" name="rating" value="5" hidden />
                    <label for="star5"><i class='bx bx-star star' style="--i: 4;"></i></label>
                </div>
                <textarea name="opinion" cols="30" rows="5" placeholder="Your opinion..."></textarea>
                <div class="btn-group">
                    <button type="submit" class="btn submit">Submit</button>
                    <button class="btn cancel">Cancel</button>
                </div>
            </form>
        </div>
        <script>
            const allStar = document.querySelectorAll('.rating .star')
            const ratingValue = document.querySelector('.rating input')

            allStar.forEach((item, idx) => {
                item.addEventListener('click', function() {
                    let click = 0
                    ratingValue.value = idx + 1

                    allStar.forEach(i => {
                        i.classList.replace('bxs-star', 'bx-star')
                        i.classList.remove('active')
                    })
                    for (let i = 0; i < allStar.length; i++) {
                        if (i <= idx) {
                            allStar[i].classList.replace('bx-star', 'bxs-star')
                            allStar[i].classList.add('active')
                        } else {
                            allStar[i].style.setProperty('--i', click)
                            click++
                        }
                    }
                })
            })
        </script>
    @endsection
