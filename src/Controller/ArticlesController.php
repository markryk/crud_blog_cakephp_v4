<?php
    // src/Controller/ArticlesController.php

    namespace App\Controller;

    class ArticlesController extends AppController {
        //Controller para o index (mostrar todos os artigos)
        public function index() {

            //Métodos loadComponent() e paginate() estão no arq. Controller.php
            $this->loadComponent('Paginator');
            $articles = $this->Paginator->paginate($this->Articles->find());

            //Esse 'articles' da próx. linha é a variável $articles da linha anterior
            $this->set(compact('articles'));
        }

        //Controller para mostrar determinado artigo
        public function view($slug = null) {

            //firstorFail(): arq. em Datasource/QueryTrait.php
            $article = $this->Articles->findBySlug($slug)->firstOrFail();

            //Esse 'article' é a variável $article da linha anterior
            $this->set(compact('article'));
        }

        //Controller para adicionar um artigo
        public function add() {

            //newEmptyEntity(): arq. em ORM/Table.php
            $article = $this->Articles->newEmptyEntity();
            if ($this->request->is('post')) {

                //patchEntity(): arq. em ORM/Table.php
                $article = $this->Articles->patchEntity($article, $this->request->getData());

                // Hardcoding the user_id is temporary, and will be removed later
                // when we build authentication out.
                $article->user_id = 1;

                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('Your article has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to add your article.'));
            }
            $this->set('article', $article);
            //pr($this->request->getData());
            //$this->set('article');
        }

        //Controller para editar um artigo
        public function edit($slug) {

            //firstorFail(): arq. em Datasource/QueryTrait.php
            $article = $this->Articles->findBySlug($slug)->firstOrFail();

            if ($this->request->is(['post', 'put'])) {

                //patchEntity(): arq. em ORM/Table.php
                $this->Articles->patchEntity($article, $this->request->getData());
                if ($this->Articles->save($article)) {
                    $this->Flash->success(__('Your article has been updated.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to update your article.'));
            }

            $this->set('article', $article);
        }

        //Controller para deletar um artigo
        public function delete($slug) {

            //allowMethod(): arq. em Http/ServerRequest.php
            $this->request->allowMethod(['post', 'delete']);

            //firstorFail(): arq. em Datasource/QueryTrait.php
            $article = $this->Articles->findBySlug($slug)->firstOrFail();
            if ($this->Articles->delete($article)) {
                $this->Flash->success(__('The {0} article has been deleted.', $article->title));
                return $this->redirect(['action' => 'index']);
            }
        }
    }
?>
