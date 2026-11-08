<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formation;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed Formations from CV
        $formations = [
            [
                'year' => '2026',
                'title' => 'Première année Génie Informatique — option Développement des Applications',
                'institution' => 'Institut Africain d\'Administration et d\'Études Commerciales (IAEC)',
                'location' => 'Lomé, Togo',
                'description' => 'Formation axée sur le développement web et mobile, l\'électronique numérique et analogique, ainsi que la gestion de projets informatiques.',
                'order' => 0,
            ],
            [
                'year' => '2021',
                'title' => 'Baccalauréat, Série D',
                'institution' => 'Lycée Tsévié 3',
                'location' => 'Tsévié, Togo',
                'description' => '',
                'order' => 1,
            ],
        ];
        foreach ($formations as $data) {
            Formation::firstOrCreate(
                ['year' => $data['year'], 'title' => $data['title']],
                $data
            );
        }

        // Seed Skills from CV
        $skillsData = [
            // Languages
            ['name' => 'HTML', 'category' => 'language', 'level' => 90, 'order' => 0],
            ['name' => 'CSS', 'category' => 'language', 'level' => 85, 'order' => 1],
            ['name' => 'JavaScript', 'category' => 'language', 'level' => 80, 'order' => 2],
            ['name' => 'PHP', 'category' => 'language', 'level' => 80, 'order' => 3],
            ['name' => 'Java', 'category' => 'language', 'level' => 70, 'order' => 4],
            ['name' => 'C', 'category' => 'language', 'level' => 70, 'order' => 5],
            ['name' => 'C++', 'category' => 'language', 'level' => 65, 'order' => 6],
            ['name' => 'SQL', 'category' => 'language', 'level' => 80, 'order' => 7],
            ['name' => 'Go', 'category' => 'language', 'level' => 60, 'order' => 8],
            // Frameworks
            ['name' => 'Laravel', 'category' => 'framework', 'level' => 75, 'order' => 0],
            ['name' => 'Flutter', 'category' => 'framework', 'level' => 70, 'order' => 1],
            ['name' => 'Symfony', 'category' => 'framework', 'level' => 65, 'order' => 2],
            ['name' => 'Django', 'category' => 'framework', 'level' => 70, 'order' => 3],
            // Operating Systems
            ['name' => 'Linux', 'category' => 'os', 'level' => 80, 'order' => 0],
            ['name' => 'Windows', 'category' => 'os', 'level' => 90, 'order' => 1],
            // Office
            ['name' => 'Microsoft Word', 'category' => 'office', 'level' => 90, 'order' => 0],
            ['name' => 'Microsoft PowerPoint', 'category' => 'office', 'level' => 85, 'order' => 1],
            ['name' => 'Microsoft Excel', 'category' => 'office', 'level' => 80, 'order' => 2],
            ['name' => 'Microsoft Outlook', 'category' => 'office', 'level' => 80, 'order' => 3],
            // Professional
            ['name' => 'Développement Web', 'category' => 'pro', 'level' => 85, 'order' => 0],
            ['name' => 'Développement Mobile', 'category' => 'pro', 'level' => 75, 'order' => 1],
            ['name' => 'Maintenance informatique', 'category' => 'pro', 'level' => 75, 'order' => 2],
            ['name' => 'Électronique analogique et numérique', 'category' => 'pro', 'level' => 65, 'order' => 3],
            ['name' => 'Gestion de projets', 'category' => 'pro', 'level' => 70, 'order' => 4],
            ['name' => 'Veille technologique', 'category' => 'pro', 'level' => 80, 'order' => 5],
            // Soft skills
            ['name' => 'Communication', 'category' => 'soft', 'level' => 85, 'order' => 0],
            ['name' => 'Leadership', 'category' => 'soft', 'level' => 80, 'order' => 1],
            ['name' => 'Travail d\'équipe', 'category' => 'soft', 'level' => 85, 'order' => 2],
        ];

        foreach ($skillsData as $data) {
            Skill::firstOrCreate(
                ['name' => $data['name'], 'category' => $data['category']],
                $data
            );
        }

        // Seed Blog Category
        $category = Category::firstOrCreate(
            ['slug' => 'veille-technologique'],
            ['name' => 'Veille technologique']
        );

        // Seed Welcome Blog Post
        Post::firstOrCreate(
            ['slug' => 'bienvenue-sur-mon-blog'],
            [
                'title' => 'Bienvenue sur mon blog',
                'category_id' => $category->id,
                'excerpt' => 'Premier article du blog : pourquoi j\'ai créé ce site et ce que vous y trouverez dans les prochaines semaines.',
                'content' => "Je m'appelle Koffi Mokpokpo SODEHOUNDJI, étudiant en première année de Génie Informatique (option développement des applications) à l'IAEC de Lomé.\n\nJ'ai créé ce blog pour partager ce que j'apprends en développement web et mobile, mes projets en cours, et quelques retours d'expérience sur les technologies que j'explore : Laravel, Flutter, Symfony, Django, et bien d'autres.\n\nN'hésitez pas à me contacter via la page Contact si vous avez des questions ou des suggestions de sujets.",
                'published' => true,
                'published_at' => now()->toDateString(),
            ]
        );
    }
}
