<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'Judul Post Pertama',
            'slug' => 'judul-post-pertama',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus deleniti eos expedita officia sint quis atque quia nobis excepturi magnam non at tenetur corporis nam esse eum voluptate, blanditiis pariatur temporibus accusantium id! Corporis officiis iure esse adipisci</p><p>ipsam earum nobis voluptates incidunt deserunt quasi quidem fuga quos tempore sed sint, repellat praesentium! Mollitia vero blanditiis dolores consequatur repellat, incidunt laborum ratione illo rerum, earum pariatur nemo odio delectus cumque! Rerum dicta neque amet, delectus maxime fugiat vel vero est autem quis dolore nemo ipsa officiis odio</p><p>ut libero ipsam nulla porro beatae. Ducimus aut porro fuga possimus ipsa repudiandae. Omnis consequatur dicta explicabo qui blanditiis incidunt aspernatur id voluptatibus nam laboriosam, ad beatae quisquam dignissimos doloremque sit iure impedit similique, distinctio, repellendus maxime vel? Quod suscipit minima nemo error? Dolor quo cupiditate dolorum fugiat tenetur doloremque explicabo debitis quis! Laudantium, impedit error, repellat voluptatum id facilis officia adipisci, omnis provident cumque qui earum pariatur! Eum ea aut odio dolores nisi at ducimus inventore est. Placeat itaque sequi tempora eveniet!</p>',
            'category_id' => 1,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul Post Ke Dua',
            'slug' => 'judul-post-ke-dua',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit eaque maiores ad vitae numquam excepturi temporibus iste blanditiis vero, possimus deserunt dolore architecto? Consequuntur impedit magni eligendi vitae doloribus placeat sint officiis laborum, aut animi repellat cumque error incidunt ab facilis rem. Officia sapiente impedit similique aut dolorem doloremque quo incidunt aspernatur adipisci debitis</p><p>nemo laudantium eius corrupti eligendi rem quae, consequuntur, ipsam facilis ipsa harum porro illum est totam! Adipisci quia consectetur fugiat commodi, maiores veritatis perferendis quos placeat perspiciatis tempore dolore cumque dolor! Dolorem laudantium, tenetur odio aspernatur corporis iste perferendis pariatur, dolore nihil assumenda aperiam dolores in provident voluptatem fuga velit eum deserunt aliquid earum quod molestiae mollitia doloremque expedita odit! Alias modi, sit autem, dolor, culpa eveniet dolore vel facilis ipsa rerum non facere odit ad debitis fugit omnis numquam corporis quas? Ad incidunt vel quas expedita animi dolore libero dolor similique doloribus at. Quasi, eum?</p>',
            'category_id' => 1,
            'user_id' => 2
        ]);

        Post::create([
            'title' => 'Judul Post Ke Tiga',
            'slug' => 'judul-post-ke-tiga',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit eaque maiores ad vitae numquam excepturi temporibus iste blanditiis vero, possimus deserunt dolore architecto? Consequuntur impedit magni eligendi vitae doloribus placeat sint officiis laborum, aut animi repellat cumque error incidunt ab facilis rem. Officia sapiente impedit similique aut dolorem doloremque quo incidunt aspernatur adipisci debitis</p><p>nemo laudantium eius corrupti eligendi rem quae, consequuntur, ipsam facilis ipsa harum porro illum est totam! Adipisci quia consectetur fugiat commodi, maiores veritatis perferendis quos placeat perspiciatis tempore dolore cumque dolor! Dolorem laudantium, tenetur odio aspernatur corporis iste perferendis pariatur, dolore nihil assumenda aperiam dolores in provident voluptatem fuga velit eum deserunt aliquid earum quod molestiae mollitia doloremque expedita odit! Alias modi, sit autem, dolor, culpa eveniet dolore vel facilis ipsa rerum non facere odit ad debitis fugit omnis numquam corporis quas? Ad incidunt vel quas expedita animi dolore libero dolor similique doloribus at. Quasi, eum?</p>',
            'category_id' => 2,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul Post Ke Empat',
            'slug' => 'judul-post-ke-empat',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus deleniti eos expedita officia sint quis atque quia nobis excepturi magnam non at tenetur corporis nam esse eum voluptate, blanditiis pariatur temporibus accusantium id! Corporis officiis iure esse adipisci</p><p>ipsam earum nobis voluptates incidunt deserunt quasi quidem fuga quos tempore sed sint, repellat praesentium! Mollitia vero blanditiis dolores consequatur repellat, incidunt laborum ratione illo rerum, earum pariatur nemo odio delectus cumque! Rerum dicta neque amet, delectus maxime fugiat vel vero est autem quis dolore nemo ipsa officiis odio</p><p>ut libero ipsam nulla porro beatae. Ducimus aut porro fuga possimus ipsa repudiandae. Omnis consequatur dicta explicabo qui blanditiis incidunt aspernatur id voluptatibus nam laboriosam, ad beatae quisquam dignissimos doloremque sit iure impedit similique, distinctio, repellendus maxime vel? Quod suscipit minima nemo error? Dolor quo cupiditate dolorum fugiat tenetur doloremque explicabo debitis quis! Laudantium, impedit error, repellat voluptatum id facilis officia adipisci, omnis provident cumque qui earum pariatur! Eum ea aut odio dolores nisi at ducimus inventore est. Placeat itaque sequi tempora eveniet!</p>',
            'category_id' => 3,
            'user_id' => 2
        ]);


        Post::create([
            'title' => 'Judul Post Ke lima',
            'slug' => 'judul-post-ke-lima',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti voluptatibus natus tempore repellendus voluptate dignissimos rem, explicabo, possimus illo ad aliquam, cupiditate incidunt minima aut assumenda molestias error alias animi voluptates praesentium. Ipsum voluptatem id libero harum minima voluptatibus aliquid, ab atque quo, sed, architecto consequatur dolor facilis quam</p><p>vero cupiditate impedit maiores eaque assumenda quaerat alias. Explicabo numquam molestias ea sit harum perferendis suscipit voluptate non dicta hic! Quas est eum commodi officia culpa quibusdam minima molestias accusantium provident animi ex magni ab dolore nostrum inventore itaque, labore reiciendis dolor autem corrupti? Rerum facere iure officiis iusto corporis blanditiis odit fugiat perferendis id vitae doloremque dolor necessitatibus quidem eaque inventore accusantium deleniti nisi</p><p>eveniet culpa, a possimus ipsam? Ipsa iure iste harum suscipit, eos repellendus odit ea aut unde, cupiditate cumque deleniti ex sint aliquam ullam. Veniam culpa cum quas facilis doloribus voluptatem praesentium ab enim atque pariatur perferendis minima, vitae ea perspiciatis laboriosam blanditiis et, vel eius nemo dignissimos. Consectetur iure, sunt dolorem reiciendis delectus ipsa accusamus magni est neque vero earum aliquid.</p>',
            'category_id' => 2,
            'user_id' => 3
        ]);


        Post::create([
            'title' => 'Judul Post Ke Enam',
            'slug' => 'judul-post-ke-enam',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti voluptatibus natus tempore repellendus voluptate dignissimos rem, explicabo, possimus illo ad aliquam, cupiditate incidunt minima aut assumenda molestias error alias animi voluptates praesentium. Ipsum voluptatem id libero harum minima voluptatibus aliquid, ab atque quo, sed, architecto consequatur dolor facilis quam</p><p>vero cupiditate impedit maiores eaque assumenda quaerat alias. Explicabo numquam molestias ea sit harum perferendis suscipit voluptate non dicta hic! Quas est eum commodi officia culpa quibusdam minima molestias accusantium provident animi ex magni ab dolore nostrum inventore itaque, labore reiciendis dolor autem corrupti? Rerum facere iure officiis iusto corporis blanditiis odit fugiat perferendis id vitae doloremque dolor necessitatibus quidem eaque inventore accusantium deleniti nisi</p><p>eveniet culpa, a possimus ipsam? Ipsa iure iste harum suscipit, eos repellendus odit ea aut unde, cupiditate cumque deleniti ex sint aliquam ullam. Veniam culpa cum quas facilis doloribus voluptatem praesentium ab enim atque pariatur perferendis minima, vitae ea perspiciatis laboriosam blanditiis et, vel eius nemo dignissimos. Consectetur iure, sunt dolorem reiciendis delectus ipsa accusamus magni est neque vero earum aliquid.</p>',
            'category_id' => 3,
            'user_id' => 3
        ]);

        Post::create([
            'title' => 'Judul Post Ke Tujuh',
            'slug' => 'judul-post-ke-tujuh',
            'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus harum placeat ea eveniet! Minus maiores fuga enim ipsam dolorem perferendis dolore quam ipsa distinctio rerum reiciendis, odit consectetur dolor. Consequatur molestiae magnam quisquam fugit error vero ratione omnis iusto? Labore dignissimos quidem</p><p>vel tempore necessitatibus. Fuga, ipsum. Similique quos laborum culpa eligendi quis accusantium aut, esse voluptatem quidem rem cupiditate. Perspiciatis, eum veritatis veniam voluptatibus ab dolor nihil esse corrupti aliquam qui provident quia, sunt fuga animi dolore non aperiam. Totam fugiat, corrupti a id ex ut cupiditate unde, aliquid quod, neque accusamus laborum consectetur ducimus maxime facere? Eaque odit vitae inventore,</p><p>quisquam laborum in! Facere sit, distinctio dolor soluta pariatur at cupiditate corrupti excepturi nostrum, reprehenderit, eum vero minus aliquam! Dignissimos officia error quidem dolores blanditiis voluptatem dolorum distinctio sapiente, id quis debitis molestiae reprehenderit similique et atque nemo unde omnis</p><p>possimus quia. Vero temporibus deserunt beatae repudiandae ducimus. Ea ratione iste, culpa a mollitia est maiores, exercitationem illum, ab similique saepe deleniti et in excepturi placeat pariatur eaque architecto veritatis aut natus minus. Dolorem reiciendis explicabo vero magni?</p>',
            'category_id' => 2,
            'user_id' => 1
        ]);

        Post::create([
            'title' => 'Judul Post Ke Delapan',
            'slug' => 'judul-post-ke-delapan',
            'body' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae earum quisquam impedit eaque dolorem facere, cum adipisci perferendis nesciunt id fuga libero sed, amet rem ea. Amet voluptatum cupiditate laudantium dolor sed quas natus, cumque dolorum a repellendus laboriosam soluta ad veritatis aliquam.</p><p>Earum voluptatibus commodi eos tempora magni dignissimos distinctio ipsam minus pariatur asperiores reiciendis praesentium natus eligendi cupiditate, adipisci neque possimus autem. Dolorum voluptatibus repudiandae aperiam aut similique quas quis fugit fuga consectetur laudantium corporis, doloribus architecto aspernatur ea iure repellendus quibusdam exercitationem ex. Reprehenderit, fugiat ea? Consequatur est sed cumque dolorem,</p><p>esse neque. Expedita nihil, delectus commodi aliquid sunt neque et accusamus placeat nulla, deserunt laboriosam iure, error facilis recusandae molestias. Nihil optio ipsa quos beatae incidunt accusantium, dolorum labore ipsam blanditiis vel sunt ab totam eos ea eveniet</p><p>impedit ipsum? Illum, maiores quos sequi reprehenderit officiis nihil ullam hic quo molestiae nobis, suscipit reiciendis quaerat omnis mollitia aspernatur! Dolorem odio, error perferendis nam nobis magnam sit fugit quis laborum voluptatum repellat vel voluptatibus recusandae laboriosam consequatur, cupiditate quibusdam optio aut amet eos asperiores excepturi? Aliquid, quidem sapiente? Beatae quos a omnis ipsam rem, magnam fugiat quisquam placeat commodi reiciendis esse eaque. Officiis quisquam quam est repellat impedit temporibus odit maxime, vero consequuntur, rerum cumque natus vitae?</p>',
            'category_id' => 1,
            'user_id' => 3
        ]);
    }
}
