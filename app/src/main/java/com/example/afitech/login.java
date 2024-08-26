package com.example.afitech;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

public class login extends AppCompatActivity {

    private EditText inputEmail, inputPassword;
    private Button btnLogin;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        // Initialisation des vues
        inputEmail = findViewById(R.id.inputEmail);
        inputPassword = findViewById(R.id.inputPassword);
        btnLogin = findViewById(R.id.btnLogin);

        // Définir un clic listener pour le bouton de connexion
        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                handleLogin();
            }
        });
    }

    private void handleLogin() {
        // Récupération des valeurs des champs
        String email = inputEmail.getText().toString().trim();
        String password = inputPassword.getText().toString().trim();

        // Vérification des informations d'identification (admin et 1234)
        if ("ndem@gmail.com".equals(email) && "1234".equals(password)) {
            // Connexion réussie, passez à l'écran d'accueil
            Intent intent = new Intent(login.this, Acceuil.class);
            startActivity(intent);
            finish(); // Optionnel : Terminez l'activité actuelle pour empêcher l'utilisateur de revenir en arrière
        } else {
            // Connexion échouée, afficher un message d'erreur
            Toast.makeText(login.this, "Identifiants incorrects", Toast.LENGTH_SHORT).show();
        }
    }
}
