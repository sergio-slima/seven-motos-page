// seven-games.js (Firebase v9 - Login com Google)
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-app.js";
import { getAuth, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-auth.js";

// ✅ Substitua pelos seus dados do Firebase Console
const firebaseConfig = {
  apiKey: "AIzaSyCs-yQ_7EF2xTDpq_hdoSEsYGMjreoLYeU",
  authDomain: "seven-motos.firebaseapp.com",
  projectId: "seven-motos",
  storageBucket: "seven-motos.firebasestorage.app",
  messagingSenderId: "353710997710",
  appId: "1:353710997710:web:4896e32df82737384a509f",
  measurementId: "G-R81XSTZ45G"
};

// Inicializa Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const provider = new GoogleAuthProvider();

// Evento de clique no botão
document.addEventListener('DOMContentLoaded', () => {
  const loginBtn = document.getElementById("login-google");

  if (loginBtn) {
    loginBtn.addEventListener("click", () => {
      signInWithPopup(auth, provider)
        .then((result) => {
          const user = result.user;
          const uid = user.uid;
          const nome = user.displayName;
          const email = user.email;
          const avatar = user.photoURL;

          // Redireciona com os dados via GET
          window.location.href = `page_games.php?uid=${uid}&nome=${encodeURIComponent(nome)}&email=${encodeURIComponent(email)}&avatar=${encodeURIComponent(avatar)}`;
        })
        .catch((error) => {
          console.error("Erro no login:", error);
          alert("Erro ao fazer login com Google.");
        });
    });
  }
});
