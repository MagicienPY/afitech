package com.example.afitech;



public class DetailedActivity {

}



/*
import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.Bundle;
//import com.example.afitech.databinding.ProduitBinding;

public class DetailedActivity extends AppCompatActivity {

    private ProduitBinding binding;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        binding = ProduitBinding.inflate(getLayoutInflater());
        setContentView(binding.getRoot());

        Intent intent = getIntent();
        if (intent != null) {
            String name = intent.getStringExtra("name");
            String time = intent.getStringExtra("time");
            int ingredientsResId = intent.getIntExtra("ingredients", R.string.maggiIngredients);
            int descResId = intent.getIntExtra("desc", R.string.maggieDesc);
            int imageResId = intent.getIntExtra("image", R.drawable.pizza);

            //binding.detailName.setText(name);
            //binding.detailTime.setText(time);
            //binding.detailIngredients.setText(getString(ingredientsResId));
            //binding.detailDesc.setText(getString(descResId));
            //binding.detailImage.setImageResource(imageResId);
        }
    }
}
*/