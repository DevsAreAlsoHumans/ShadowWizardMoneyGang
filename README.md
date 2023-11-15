# Récupération du Projet Java dans Eclipse

Ce dépôt contient deux projets distincts : un projet Vue.js et un projet Java. Ce guide explique comment récupérer et configurer le projet Java dans Eclipse.

## Prérequis

1. **Git :** Assurez-vous d'avoir Git installé sur votre machine. Si ce n'est pas le cas, vous pouvez le télécharger [ici](https://git-scm.com/).

2. **Eclipse :** Assurez-vous d'avoir Eclipse installé sur votre machine. Si ce n'est pas le cas, vous pouvez le télécharger [ici](https://www.eclipse.org/downloads/).

## Instructions

1. **Clonage du dépôt :**
   - Ouvrez une fenêtre de terminal.
   - Exécutez la commande suivante pour cloner le dépôt :
     ```bash
     git clone <URL_du_dépôt>
     ```

2. **Accéder à la branche PROJET-JAVA :**
   - Changez de répertoire vers le dossier du dépôt cloné :
     ```bash
     cd <nom_du_dépôt>
     ```
   - Changez de branche vers `PROJET-JAVA` :
     ```bash
     git checkout PROJET-JAVA
     ```

3. **Ouvrir le projet dans Eclipse :**
   - Lancez Eclipse.
   - Allez dans `File -> Import -> General -> Existing Projects into Workspace`.
   - Choisissez "Select root directory" et parcourez le dossier du dépôt Git.
   - Sélectionnez le projet Java.

4. **Configuration du projet :**
   - Vérifiez la configuration du projet. Assurez-vous que le Build Path et les bibliothèques nécessaires sont correctement configurés.

5. **Mise à jour du projet :**
   - Cliquez avec le bouton droit sur le projet dans l'explorateur de projets.
   - Allez dans `Team -> Pull` pour récupérer les dernières modifications de la branche `PROJET-JAVA`.

