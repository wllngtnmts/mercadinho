# mercadinho
<h1>Trabalho TCC I e TCC II Engenharia em Software</h1>
<h2>Códigos Git Hub</h2>

1. Primeiro criar a conta e o diretório online
2. Instalar o software do Git Hub
3. Rodar o comando de inicialização no terminal

```
    git init
```


4. Acesso ao servidor online
```
    git remote add origin URL_DO_SEU_DIRETÓRIO_ONLINE    
```
> Ex: git remote add origin https://github.com/wllngtnmts/mercadinho


5. Criar a branch principal
```
    git branch -M master
    git branch -M hierarquia
```
 6. Se for o primeiro envio
```
    git add .  
    git commit -m "Primeiro upload dos arquivos"
    git push -u origin master
```

7. Quando tiver outros programadores desenvolvendo a mesma aplicação, primeiro baixe a ultima versão para sua máquina
```
    git pull --rebase origin master
```

8. Depois das suas modificações no código
```
    git add .  
    git commit -m "Atualização no módulo de hierarquia - popus de gestão"
    git pull origin master "Verifica se á uma atualização de colegas e baixa antes do deploy"
    git push -u origin master "Submete as atualizações para o git"
```
