<?php
interface InstagramDAOInterface{
//############## User

//1-Cadastrar usuário
public function saveUser($user);

//2-Ler usuário
public function getUserById($user_id);

//3-Atualizar dados usuário
public function updateUser($user);

//4-Remover
public function removeUserById($user_id);

//5-Buscar usuários por nome
public function getUsersByName($user_name);

//6-Retornar todos os usuários
public function getAllUsers();

//7-Usuários cadastrados após data tempo
public function getAllRegisteredUsersBetween($date1, $date2, $offset, $limit);

//8-Buscar conteúdo de usuário ordenado por ordem decrescente de criação
public function getContentOfUser($user, $offset, $limit, $type);

//9-Buscar conteúdo em que usuário foi marcada em ordem decrescente de marcação
public function getContentUserTagged($user, $offset, $limit, $type);

//############## Content

//10-Cadastrar conteúdo
public function saveContent($content);

//11-Buscar conteúdo por ID
public function getContentById($content_id);

//12-Remover conteúdo
public function removeContent($content);

//13-Atualizar contéudo
public function updateContent($content);

//14 - Buscar todos os usuários que comentaram o conteúdo por ordem decrescente de like
public function getListOfCommentators($content, $offset, $limit);

//15 - Retorna quantidade de usuários que comentaram o contéudo
public function getNumberOfCommentators($content);

//############## UserLikesContent

//16-Usuário u curte conteúdo c
public function like($user, $content);

//17-Usuário user remove curtida de conteúdo c
public function unlike($user, $content);

//18-Buscar todos os contéudos que usuário curtiu em ordem decrescente do tempo de curtida
public function getListOfLikedContent($user, $type, $offset, $limit);

//19-Buscar todos os usuários que curtiram o contéudo
public function getListOfUsersLikedContent($content, $offset, $limit);

//20-Buscar quantidade de usuários que curtiram conteúdo
public function getNumberOfUsersLikedContent($content);

//############## UserFollowUser

//21-Usuário a segue usuário b
public function follow($a, $b);

//22-Usuário a parou de seguir usuário b
public function unfollow($a, $b);

//23-Buscar todos os seguidores de um usuário u
public function getFollowersList($user, $offset, $limit);

//24-Buscar todos usuários que o usuário u segue
public function getFollowingList($user, $offset, $limit);

//25-Retorna lista de usuários ordenados por número de seguidores
public function getMostFollowedUsers($offset, $limit);

//############## ContentTagsUser

//26-Criar marcação
public function createTagInContent($content, $user);

//27-Remover marcação
public function removeTagInContent($content, $user);

//28-Lista de conteúdos que o usuário foi marcado ordenada por ordem de marcação
public function getListOfContentsUserTagged($user, $offset, $limit);

//29-Quantidade de conteúdos que o usuário foi marcado
public function getQtdContentsUserTagged();

//30-Lista de usuários marcados num conteúdo
public function getListOfUserTaggedInContent($content, $offset, $limit);

//31-Quantidade de usuários marcados
public function getQtdUserTaggedInContent($content);

//############## UserCommentsContent

//32-Usuário cria comentário no conteúdo
public function createComment($user, $content);

//33-Usuário remove comentário de conteúdo
public function removeComment($comment);

//34-Usuário atualiza comentário em conteúdo
public function updateComment($comment);

//35-Lista de comentários de conteúdo
public function getListOfComments($content, $offset, $limit);

//36-Retorna quantidade de comentários de um conteúdo
public function getNumberOfComments($content);

//37-Lista de comentários feitos por um usuário em ordem decrescente de criação
public function getListOfCommentsByUser($user, $offset, $limit);

//############## UserLikesComment

//38-Usuário curte um comentário
public function userLikeComment($user, $comment);

//39-Usuário descurte um comentário
public function userUnlikeComment($user, $comment);

//40-Quantidade de likes de um comentário
public function getNumberLikesComment($comment);

//41-Lista de usuários que curtiram
public function getListOfUsersLikedComment($comment, $offset, $limit);

//############## CommentTagsUser

//42-Criar marcação
public function createTagInComment($comment, $user);

//43-Remover marcação
public function removeTagInComment($comment, $user);

//44-Lista de comentários que o usuário foi marcado ordenada por ordem de marcação
public function getListOfCommmentsUserTagged($user, $offset, $limit);

//45-Quantidade de comentários que o usuário foi marcado
public function getQtdCommentsUserTagged();

//46-Lista de usuários marcados num conteúdo
public function getListOfUserTaggedInComment($comment, $offset, $limit);

//47-Quantidade de usuários marcados
public function getQtdUserTaggedInComment($comment);

//############## Effect

//48-Criar efeito
public function createEffect($effect);

//49-Remover efeito
public function removeEffect($effect);

//50-Atualizar efeito
public function updateEffect($effect);


//51-Listar todos os efeitos
public function getListOfEffects();

}

