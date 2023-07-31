<!-- component -->
<div id="success-message" class="flex flex-row justify-end w-full">
    <div class="bg-green-100 rounded-md p-3 flex ">
        <svg class="stroke-2 stroke-current text-green-600 h-8 w-8 mr-2 flex-shrink-0" viewBox="0 0 24 24" fill="none"
            strokeLinecap="round" strokeLinejoin="round">
            <path d="M0 0h24v24H0z" stroke="none" />
            <circle cx="12" cy="12" r="9" />
            <path d="M9 12l2 2 4-4" />
        </svg>

        <div class="text-green-700">
            <div class="font-bold text-xl">{{session('success')}}</div>
        </div>
    </div>

</div>
<script>
    // On récupère la balise du message de succès
    const successMessage = document.getElementById('success-message');

    // On vérifie si la balise existe avant de la traiter
    if (successMessage) {
        // On utilise setTimeout pour supprimer la balise après 1000 millisecondes (1 seconde)
        setTimeout(() => {
            successMessage.remove();
        }, 3000);
    }
</script>