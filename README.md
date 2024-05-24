# Projet-symfony-Gestion_Patient
welcome in " HealthTrackr " This web application, built with Symfony 6 and Tailwind CSS, allows admins to manage patients' care sessions. Admins can create, read, update, and delete users and sessions, and schedule sessions for patients. Patients can log in to view their assigned sessions. The app features secure login and role-based access control.

## Database Setup

To set up the database for this Symfony application, you need to run the following commands:

1. **Create the database**:
   This command initializes the database as per the configurations specified in your Doctrine settings.
   ```bash
   php bin/console doctrine:database:create

3. **Create the database schema**:
This command generates the database schema based on the current mapping metadata of your entities, constructing the necessary tables and relationships in the database.
   ```bash
   php bin/console doctrine:schema:create

![Capture d'écran 2024-05-24 193227](https://github.com/RayenMarzouk6/Projet-symfony-Gestion-Patient/assets/162569033/e1e8dff9-0d45-456d-9d9d-4b16ea6913b4)
![Capture d'écran 2024-05-24 193400](https://github.com/RayenMarzouk6/Projet-symfony-Gestion-Patient/assets/162569033/7b841290-2ed4-40df-8658-73511543283a)
![Capture d'écran 2024-05-24 192904](https://github.com/RayenMarzouk6/Projet-symfony-Gestion-Patient/assets/162569033/9dc897f6-9d2d-482d-82f5-6060d3638892)
![Capture d'écran 2024-05-24 192927](https://github.com/RayenMarzouk6/Projet-symfony-Gestion-Patient/assets/162569033/68937844-e758-4b84-b198-4cf14ac2f912)
![Capture d'écran 2024-05-24 192948](https://github.com/RayenMarzouk6/Projet-symfony-Gestion-Patient/assets/162569033/3510daf7-bc50-432e-8b03-bb9127c88a8f)
![Capture d'écran 2024-05-24 193107](https://github.com/RayenMarzouk6/Projet-symfony-Gestion-Patient/assets/162569033/0efd8129-e75a-4627-9fef-3876c17d9f10)
