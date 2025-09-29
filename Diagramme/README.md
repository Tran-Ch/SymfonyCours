Explications

1/ Utilisateur : représente le compte de l’utilisateur (module 👤).

2/ Destination : lieux touristiques, peuvent avoir des événements ou des histoires associées (module 🗺️).

3/ Plat : plats traditionnels, recettes et vidéos associées (module 🍲).

4/ Evenement : fêtes et traditions locales, connectées aux destinations (module 🎉).

5/ Workshop : ateliers pratiques pour apprendre la cuisine ou l’artisanat (module 📚).

6/ Story : témoignages de la communauté (module 🌍).

7/ Itineraire / ItineraireItem : planification d’activités et de visites (module 📅).

8/ Reservation : permet de réserver une activité, un atelier ou un tour (module 🧭).

9/ Recherche & recommandations : sera implémentée par des méthodes internes aux classes (module 🔍).



I/ class Utilisateur:
    Utilisateur représente une personne qui consulte le site, crée des itinéraires, réserve, ou partage des histoires.

    Attributs :

        id:int → identifiant unique de l’utilisateur.

        nom:string → nom complet.

        email:string → adresse email pour connexion/contact.

        preferences:json → préférences de l’utilisateur stockées en JSON (par ex. goûts culinaires, types de destinations).

II/ class Destination:
    Destination correspond à un lieu touristique.

    Attributs :

        id:int → identifiant unique.

        nom:string → nom du lieu ou site touristique.

        region:string → région ou province.

        description:text → texte détaillé décrivant le lieu.

        localisation:geo → coordonnées géographiques pour cartographie.

        media:json → photos, vidéos, liens multimédia associés.

III/ class Plat:
    Représente un plat ou spécialité locale.
    Destination --> Plat : un lieu peut proposer plusieurs plats locaux.

    Plat --> Story : les utilisateurs peuvent partager des histoires ou expériences sur un plat.

    Workshop --> Plat : un atelier peut enseigner un ou plusieurs plats.

    Attributs :

        ingredients:json → liste des ingrédients et éventuellement recettes en JSON.

IV/ class Evenement:
    Evenement représente un festival, une fête ou un événement culturel.

    dateDebut / dateFin → période de l’événement.

    etiquette:json → informations sur les règles, traditions ou recommandations pour le visiteur.

V/ class Workshop:
    Workshop représente un atelier ou un cours pratique (cuisine, artisanat, culture).

    prix → coût de participation.

    duree → durée en minutes ou heures.

VI/ class Itineraire:
    Itineraire est un plan de voyage créé par un utilisateur.

    meta:json → informations supplémentaires comme le thème du voyage, notes, ou contraintes.

VII/ class ItineraireItem:
    Représente une activité ou visite dans un itinéraire.

    type → indique si c’est une Destination, Evenement ou Workshop.

    scheduledAt → date et heure planifiées.

    dureeMin → durée approximative en minutes.

VIII/ class Reservation:
    Représente la réservation d’un tour ou d’un atelier.

    produitType → indique s’il s’agit d’un Workshop ou d’un tour (Destination/Evenement).

    statut → peut être "annulée" ou "confirmée".

IX/ class Story
    Représente un témoignage ou récit d’un utilisateur.

    apprentissages:json → les leçons culturelles ou expériences personnelles.

X/ class Wishlist:
    Liste des favoris ou envies d’un utilisateur.

    targetType → peut pointer vers Destination, Evenement, Workshop, etc.
