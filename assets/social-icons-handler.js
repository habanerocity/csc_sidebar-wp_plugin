document.addEventListener('DOMContentLoaded', function() {
    const authorEmailHash = cscSidebarData.authorEmailHash; 
    const apiUrl = 'https://api.gravatar.com/v3/profiles/' + authorEmailHash;

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            console.log(data);

            const socialMediaIcons = document.getElementById('social-media-icons');
        
            if (data.verified_accounts && data.verified_accounts.length > 0) {
                data.verified_accounts.forEach(account => {
                    if (['facebook', 'instagram', 'twitter', 'tiktok', 'github'].includes(account.service_type) && isValidUrl(account.url)) {
                        const li = document.createElement('li');
                        const a = document.createElement('a');
                        const i = document.createElement('i');
                
                        a.href = account.url;
                        a.setAttribute('aria-label', sanitizeText(account.service_label));
                        a.setAttribute('target', '_blank');
                        i.className = `fab fa-${account.service_type} flex_container`;
                
                        a.appendChild(i);
                        li.appendChild(a);
                        socialMediaIcons.appendChild(li);
                    } else {
                        console.log(`Unsupported or invalid service type/URL: ${account.service_type}, ${account.url}`);
                    }
                });
            }

            document.getElementById('author-name').textContent = sanitizeText(data.display_name);
            document.getElementById('occupation').textContent = sanitizeText(data.job_title);
            document.getElementById('location').textContent = '\u00A0' + sanitizeText(data.location);
            
        })
        .catch(error => console.error('Error fetching data:', error));
});

function isValidUrl(url) {
    const pattern = new RegExp('^(https:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
    return !!pattern.test(url);
}

function sanitizeText(text) {
    return text.replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
}