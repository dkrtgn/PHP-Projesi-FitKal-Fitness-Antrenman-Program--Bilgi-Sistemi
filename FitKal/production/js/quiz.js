const quizData = [  
    {  
    question: "Bir elinin baş ve orta parmağını diğer el bileğine geçir...",  
    a: "Parmaklar üst üste geldi.",  
    b: "Parmaklar ucuyla değdi.",  
    c: "Parmaklar değmedi.",  
    d: "",  
    correct: "b",  
    },  
    {  
    question: "Vücudun yağı nerde depoluyor?",  
    a: "Kol, göğüs ve boyun",  
    b: "Karın ve belde",  
    c: "Kalça ve bacak",  
    d: "Özellikle bir yerde farketmiyorum",  
    correct: "b",  
    },  
    {  
    question: "Fiziğini nasıl tanımlarsın?",  
    a: "Dar omuz çatısı, küçük kemik yapısı, ince",  
    b: "Güçlü diri dikdörtgen yapılı",  
    c: "Kütle kazanmaya ve taşımaya meyilli, geniş yapı",  
     
    correct: "a",  
    },  
    {  
    question: "Hangisi senin yeme alışkanlığın ve metabolizman?",  
    a: "Çok yesemde kilom artmıyor",  
    b: "Kilo almak istersem alırım, vermek istersem veririm",  
    c: "Su içsem yarıyor.",  
      
    correct: "b",  
    },  
];  

const quiz = document.getElementById("quiz");  
const answerElements = document.querySelectorAll(".answer");  
const questionElement = document.getElementById("question");  
const a_text = document.getElementById("a_text");  
const b_text = document.getElementById("b_text");  
const c_text = document.getElementById("c_text");  
const d_text = document.getElementById("d_text");  
const submitButton = document.getElementById("submit");  

let currentQuiz = 0;  
let score = 0;  

const deselectAnswers = () => {  
    answerElements.forEach((answer) => (answer.checked = false));  
};  

const getSelected = () => {  
    let answer;  
    answerElements.forEach((answerElement) => {  
    if (answerElement.checked) answer = answerElement.id;  
    });  
    return answer;  
};  

const loadQuiz = () => {  
    deselectAnswers();  
    const currentQuizData = quizData[currentQuiz];  
    questionElement.innerText = currentQuizData.question;  
    a_text.innerText = currentQuizData.a;  
    b_text.innerText = currentQuizData.b;  
    c_text.innerText = currentQuizData.c;  
    d_text.innerText = currentQuizData.d;  
};  

loadQuiz();  

submitButton.addEventListener("click", () => {  
    const answer = getSelected();  
    if (answer) {  
        if (answer === quizData[currentQuiz].correct) score++;  
        currentQuiz++;  
        if (currentQuiz < quizData.length) loadQuiz();  
        else {  
            quiz.innerHTML = `  
            <h2>${quizData.length} - ${score} Ektomorf./Kilo almak senin için zor derler, evet zordur. Ancak yağsız şekilde büyümek de bir o kadar kolay. Maraton koşucusu gibi vitaminsiz kalmak istemiyorsan bravo, zorunda değilsin. Bu yazıda bahsedildiği gibi yersen, Ağırsağlam antrenman yaparsan, çok estetik şekilde gelişmen işten bile değil!</h2>  
            <button onclick="history.go(0)">Baştan Başla</button>  
            ` 
        }  
    }  
}); 