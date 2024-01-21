<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platforma Kursów Online</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <span>Platforma elerningowa</span>
        <nav>
            <ul>
                <li><a href="#">Strona główna</a></li>
                <li><a href="kursy.html">Kursy</a></li>
                <li><a href="logowanie.html">Logowanie</a></li>
                <li><a href="rejestracja.html">Rejestracja</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <div class="tile">
            <div class="left-image">
                <img src="https://www.passionned.nl/wp/wp-content/uploads/incompany-training-1024x682.png" alt="Left Image">
            </div>
            <div class="left-text">
                <h2>Kursy Online</h2>
                <p>Zapraszamy do odkrywania naszej różnorodnej oferty kursów online. Na Platformie Kursów Online zdajemy sobie sprawę, że każdy uczeń ma unikalne potrzeby i cele edukacyjne. Dlatego też starannie dobieramy nasze kursy, aby dostarczyć Ci kompleksowe i inspirujące doświadczenia naukowe. Bez względu na to, czy aspirujesz do rozwoju w dziedzinie technologii, biznesu, czy sztuki, nasze bogactwo tematyczne obejmuje szeroką gamę kursów. Dodatkowo, nasze zespoły instruktorów, złożone z ekspertów w danej dziedzinie, są gotowe podzielić się swoją wiedzą i doświadczeniem, abyś mógł skutecznie osiągnąć swoje cele edukacyjne.</p>
            </div>
        </div>

        <div class="tile">
            <div class="right-text">
                <h2>Kontynuuj Naukę</h2>
                <p>Na Platformie Kursów Online chcemy, aby nauka była fascynująca i dostępna dla każdego. Oferujemy interaktywne narzędzia, takie jak quizy, projekty praktyczne i platformy do wymiany doświadczeń z innymi uczestnikami kursów. Ponadto, nasze kursy są dostępne w trybie online, co pozwala Ci dostosować naukę do Twojego tempa i harmonogramu. Dzięki temu, nawet w dynamicznym stylu życia, możesz kontynuować rozwijanie się zawodowo i osobowo. Nasza platforma stale aktualizuje swoją ofertę, abyś miał dostęp do najnowszych treści, co pozwala Ci być na bieżąco z najnowszymi trendami i osiągnięciami w danej dziedzinie. Wspólnie z nami, odkryjesz fascynujący świat wiedzy, który jest zawsze na wyciągnięcie ręki.</p>
            </div>
            <div class="right-image">
                <img src="https://hollcert.pl/wp-content/uploads/2022/02/AdobeStock_319238000-scaled-1.jpeg" alt="Right Image">
            </div>
        </div>

        <section class="courses-section">
        <h2>Oferty Kursów</h2>
        <div class="course-offers" id="course-offers-container">
            <!-- Kursy będą renderowane tutaj przez skrypt JavaScript -->
        </div>
        <div id="login-notification">
            Aby zapisać się na kurs, zaloguj się.
        </div>
    </section> 

    <footer class="footer">
        <p>Platforma Kursów Online &copy; 2024. Wszelkie prawa zastrzeżone.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const courseOffersContainer = document.getElementById('course-offers-container');
            const loginNotification = document.getElementById('login-notification');

            // Sprawdź, czy użytkownik jest zalogowany
            const loggedInUser = sessionStorage.getItem('username');
            const isUserLoggedIn = loggedInUser !== null;

            if (!isUserLoggedIn) {
                loginNotification.style.display = 'block';
            }

            // Pobierz kursy
            try {
                const response = await fetch('http://localhost:8080/api/v1/course');
                if (response.ok) {
                    const courses = await response.json();

                    courses.forEach(course => {
                        const courseOffer = document.createElement('div');
                        courseOffer.className = 'course-offer';

                        courseOffer.innerHTML = `
                            <h3>${course.title}</h3>
                            <p>${course.description}</p>
                        `;

                        courseOffersContainer.appendChild(courseOffer);
                    });
                } else {
                    console.error('Błąd pobierania kursów:', response.status);
                }
            } catch (error) {
                console.error('Błąd:', error);
            }
        });
    </script>
</body>
</html>