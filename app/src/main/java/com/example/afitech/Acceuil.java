package com.example.afitech;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import androidx.appcompat.app.AppCompatActivity;

public class Acceuil extends AppCompatActivity {

    private ImageView clothingImage;
    private ImageView commandeImage;
    private ImageView commissionImage;
    private ImageView commentaireImage;
    private ImageView parrainageImage;
    private ImageView reglageImage;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.acceil); // Assure-toi que le nom du layout est correct

        // Lier les ImageView avec leurs IDs
        clothingImage = findViewById(R.id.clothingImage);
        commandeImage = findViewById(R.id.elecImage);
        commissionImage = findViewById(R.id.homeImage);
        commentaireImage = findViewById(R.id.grocImage);
        parrainageImage = findViewById(R.id.beautyImage);
        reglageImage = findViewById(R.id.pharmImage);

        // Ajouter un OnClickListener à chaque ImageView
        clothingImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Diriger vers ClothingActivity
                Intent intent = new Intent(Acceuil.this, ClothingActivity.class);
                startActivity(intent);
            }
        });

        commandeImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Diriger vers Commande
                Intent intent = new Intent(Acceuil.this, Commande.class);
                startActivity(intent);
            }
        });

        commentaireImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Diriger vers Commantaire
                Intent intent = new Intent(Acceuil.this, Commantaire.class);
                startActivity(intent);
            }
        });

        reglageImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(Acceuil.this, Reglage.class);
                startActivity(intent);
            }
        });

        commissionImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Diriger vers Commission
                Intent intent = new Intent(Acceuil.this, Commission.class);
                startActivity(intent);
            }
        });

        parrainageImage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Diriger vers Parrainage
                Intent intent = new Intent(Acceuil.this, Parrainage.class);
                startActivity(intent);
            }
        });
    }
}
